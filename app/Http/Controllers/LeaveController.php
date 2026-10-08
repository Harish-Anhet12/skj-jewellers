<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Display leave requests.
     *
     * Admin:
     * Shows all employee leave requests.
     *
     * Employee:
     * Shows only their own leave requests.
     */
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Admin Leave Requests
        |--------------------------------------------------------------------------
        */

        if ($user->role && $user->role->name === 'Admin') {

            $leaveRequests = LeaveRequest::with([
                'user',
                'leaveType',
                'approver'
            ])
                ->latest()
                ->get();

            return view(
                'leave.admin.index',
                compact('leaveRequests')
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Employee Leave Requests
        |--------------------------------------------------------------------------
        */

        $leaveRequests = LeaveRequest::with('leaveType')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'leave.index',
            compact('leaveRequests')
        );
    }


    /**
     * Show the leave application form.
     */
    public function create()
    {
        $leaveTypes = LeaveType::orderBy('name')->get();

        return view(
            'leave.create',
            compact('leaveTypes')
        );
    }


    /**
     * Store a new leave request.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'leave_type_id' => [
                'required',
                'exists:leave_types,id'
            ],

            'from_date' => [
                'required',
                'date'
            ],

            'to_date' => [
                'required',
                'date',
                'after_or_equal:from_date'
            ],

            'reason' => [
                'nullable',
                'string',
                'max:1000'
            ],
        ]);


        LeaveRequest::create([
            'user_id' => Auth::id(),

            'leave_type_id' => $validated['leave_type_id'],

            'from_date' => $validated['from_date'],

            'to_date' => $validated['to_date'],

            'reason' => $validated['reason'] ?? null,

            'status' => 'Pending',
        ]);


        return redirect()
            ->route('leave.index')
            ->with(
                'success',
                'Leave request submitted successfully.'
            );
    }


    /**
     * Approve a leave request.
     */
    public function approve(LeaveRequest $leaveRequest)
    {
        $this->ensureAdmin();


        /*
        |--------------------------------------------------------------------------
        | Prevent processing an already processed request
        |--------------------------------------------------------------------------
        */

        if ($leaveRequest->status !== 'Pending') {

            return redirect()
                ->route('leave.index')
                ->with(
                    'error',
                    'This leave request has already been processed.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Approve Request
        |--------------------------------------------------------------------------
        */

        $leaveRequest->update([
            'status' => 'Approved',

            'approved_by' => Auth::id(),

            'approved_at' => now(),

            'rejection_reason' => null,
        ]);


        return redirect()
            ->route('leave.index')
            ->with(
                'success',
                'Leave request approved successfully.'
            );
    }


    /**
     * Reject a leave request.
     */
    public function reject(
        Request $request,
        LeaveRequest $leaveRequest
    ) {

        $this->ensureAdmin();


        /*
        |--------------------------------------------------------------------------
        | Validate rejection reason
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'rejection_reason' => [
                'required',
                'string',
                'max:1000'
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Prevent processing an already processed request
        |--------------------------------------------------------------------------
        */

        if ($leaveRequest->status !== 'Pending') {

            return redirect()
                ->route('leave.index')
                ->with(
                    'error',
                    'This leave request has already been processed.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Reject Request
        |--------------------------------------------------------------------------
        */

        $leaveRequest->update([
            'status' => 'Rejected',

            'rejection_reason' =>
                $validated['rejection_reason'],

            'approved_by' => Auth::id(),

            'approved_at' => now(),
        ]);


        return redirect()
            ->route('leave.index')
            ->with(
                'success',
                'Leave request rejected successfully.'
            );
    }


    /**
     * Make sure only Admin can approve or reject leave.
     */
    private function ensureAdmin(): void
    {
        abort_unless(
            Auth::user()->role &&
            Auth::user()->role->name === 'Admin',
            403
        );
    }
}