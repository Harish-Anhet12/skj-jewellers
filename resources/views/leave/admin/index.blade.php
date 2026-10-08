@extends('layouts.app')

@section('title', 'Leave Requests')

@section('header', 'Leave Requests')

@section('content')

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

    <!-- Header -->
    <div class="p-6 border-b border-gray-100">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

            <div>
                <h3 class="text-lg font-semibold text-gray-800">
                    Employee Leave Requests
                </h3>

                <p class="text-sm text-gray-500 mt-1">
                    Review and manage employee leave applications.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700">
                    Pending:
                    {{ $leaveRequests->where('status', 'Pending')->count() }}
                </span>
            </div>

        </div>
    </div>


    <!-- Success Message -->
    @if(session('success'))

        <div class="mx-6 mt-6 bg-emerald-50 border border-emerald-200 rounded-xl p-4">

            <div class="flex items-center">

                <svg
                    class="w-5 h-5 text-emerald-600 mr-3"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7"
                    />

                </svg>

                <p class="text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    <!-- Error Message -->
    @if(session('error'))

        <div class="mx-6 mt-6 bg-red-50 border border-red-200 rounded-xl p-4">

            <div class="flex items-center">

                <svg
                    class="w-5 h-5 text-red-600 mr-3"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />

                </svg>

                <p class="text-sm font-medium text-red-700">
                    {{ session('error') }}
                </p>

            </div>

        </div>

    @endif


    <!-- Validation Errors -->
    @if($errors->any())

        <div class="mx-6 mt-6 bg-red-50 border border-red-200 rounded-xl p-4">

            <p class="text-sm font-semibold text-red-800">
                Please check the following:
            </p>

            <ul class="mt-2 list-disc list-inside text-sm text-red-700">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- Table -->
    <div class="overflow-x-auto mt-6">

        <table class="w-full whitespace-nowrap">

            <thead class="bg-gray-50/50">

                <tr>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Employee
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Leave Type
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        From
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        To
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Reason
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Status
                    </th>

                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Action
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-gray-100">

                @forelse($leaveRequests as $leave)

                    <tr class="hover:bg-gray-50/50 transition-colors">

                        <!-- Employee -->
                        <td class="px-6 py-4">

                            <div class="flex items-center">

                                <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center mr-3">

                                    <span class="text-sm font-semibold text-indigo-600">
                                        {{ strtoupper(substr($leave->user->name, 0, 1)) }}
                                    </span>

                                </div>

                                <div>

                                    <p class="text-sm font-medium text-gray-800">
                                        {{ $leave->user->name }}
                                    </p>

                                    <p class="text-xs text-gray-400">
                                        {{ $leave->user->email }}
                                    </p>

                                </div>

                            </div>

                        </td>


                        <!-- Leave Type -->
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">

                            {{ $leave->leaveType->name }}

                        </td>


                        <!-- From -->
                        <td class="px-6 py-4 text-sm text-gray-600">

                            {{ $leave->from_date->format('d-m-Y') }}

                        </td>


                        <!-- To -->
                        <td class="px-6 py-4 text-sm text-gray-600">

                            {{ $leave->to_date->format('d-m-Y') }}

                        </td>


                        <!-- Reason -->
                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs whitespace-normal">

                            {{ $leave->reason ?? '-' }}

                        </td>


                        <!-- Status -->
                        <td class="px-6 py-4">

                            @if($leave->status === 'Approved')

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700">
                                    Approved
                                </span>

                            @elseif($leave->status === 'Rejected')

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700">
                                    Rejected
                                </span>

                            @else

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700">
                                    Pending
                                </span>

                            @endif

                        </td>


                        <!-- Actions -->
                        <td class="px-6 py-4">

                            @if($leave->status === 'Pending')

                                <div class="flex items-center gap-2">

                                    <!-- Approve -->
                                    <form
                                        action="{{ route('leave.approve', $leave) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="inline-flex items-center px-3 py-2 rounded-lg bg-emerald-600 text-white text-xs font-medium hover:bg-emerald-700 transition-colors"
                                            onclick="return confirm('Are you sure you want to approve this leave request?')"
                                        >

                                            Approve

                                        </button>

                                    </form>


                                    <!-- Reject -->
                                    <button
                                        type="button"
                                        onclick="document.getElementById('reject-modal-{{ $leave->id }}').classList.remove('hidden')"
                                        class="inline-flex items-center px-3 py-2 rounded-lg bg-red-600 text-white text-xs font-medium hover:bg-red-700 transition-colors"
                                    >

                                        Reject

                                    </button>

                                </div>

                            @else

                                <span class="text-xs text-gray-400">
                                    Processed
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="7"
                            class="px-6 py-12 text-center"
                        >

                            <div class="text-gray-400 mb-3">

                                <svg
                                    class="mx-auto h-10 w-10"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 002 2v12a2 2 0 002 2z"
                                    />

                                </svg>

                            </div>

                            <p class="text-sm text-gray-500">
                                No leave requests found.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <!-- Reject Modals -->
    @foreach($leaveRequests as $leave)

        @if($leave->status === 'Pending')

            <div
                id="reject-modal-{{ $leave->id }}"
                class="hidden fixed inset-0 z-50 overflow-y-auto"
            >

                <div class="flex items-center justify-center min-h-screen px-4">

                    <!-- Background Overlay -->
                    <div
                        class="fixed inset-0 bg-black/40"
                        onclick="document.getElementById('reject-modal-{{ $leave->id }}').classList.add('hidden')"
                    ></div>


                    <!-- Modal -->
                    <div class="relative bg-white rounded-2xl shadow-xl w-full max-w-lg p-6">

                        <div class="flex items-center justify-between mb-5">

                            <div>

                                <h3 class="text-lg font-semibold text-gray-800">
                                    Reject Leave Request
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Please provide a reason for rejection.
                                </p>

                            </div>

                            <button
                                type="button"
                                onclick="document.getElementById('reject-modal-{{ $leave->id }}').classList.add('hidden')"
                                class="text-gray-400 hover:text-gray-600"
                            >

                                <svg
                                    class="w-6 h-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />

                                </svg>

                            </button>

                        </div>


                        <form
                            action="{{ route('leave.reject', $leave) }}"
                            method="POST"
                        >

                            @csrf

                            <label
                                for="rejection_reason_{{ $leave->id }}"
                                class="block text-sm font-medium text-gray-700 mb-2"
                            >
                                Rejection Reason
                            </label>


                            <textarea
                                name="rejection_reason"
                                id="rejection_reason_{{ $leave->id }}"
                                rows="4"
                                maxlength="1000"
                                required
                                placeholder="Enter the reason for rejecting this leave request..."
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 resize-none"
                            ></textarea>


                            <div class="flex justify-end gap-3 mt-5">

                                <button
                                    type="button"
                                    onclick="document.getElementById('reject-modal-{{ $leave->id }}').classList.add('hidden')"
                                    class="px-4 py-2 rounded-xl bg-gray-100 text-gray-600 text-sm font-medium hover:bg-gray-200"
                                >

                                    Cancel

                                </button>


                                <button
                                    type="submit"
                                    class="px-5 py-2 rounded-xl bg-red-600 text-white text-sm font-medium hover:bg-red-700"
                                >

                                    Reject Leave

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        @endif

    @endforeach

</div>

@endsection