@extends('layouts.app')

@section('title', 'Leave Management')
@section('header', 'Leave Management')

@section('content')

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

    <div class="p-6 border-b border-gray-100 flex justify-between items-center">

        <div>
            <h3 class="text-lg font-semibold text-gray-800">
                My Leave Requests
            </h3>

            <p class="text-sm text-gray-500 mt-1">
                View and track your leave applications.
            </p>
        </div>

        <a href="{{ route('leave.create') }}"
           class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-xl font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors text-sm">

            <svg class="-ml-1 mr-2 h-5 w-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4v16m8-8H4">
                </path>

            </svg>

            Apply for Leave

        </a>

    </div>

    {{-- Success Message --}}
    @if(session('success'))

        <div class="mx-6 mt-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm">
            {{ session('success') }}
        </div>

    @endif

    {{-- Error Message --}}
    @if(session('error'))

        <div class="mx-6 mt-6 p-4 rounded-xl bg-red-50 border border-red-100 text-red-700 text-sm">
            {{ session('error') }}
        </div>

    @endif

    <div class="overflow-x-auto mt-6">

        <table class="w-full whitespace-nowrap">

            <thead class="bg-gray-50/50">

                <tr>

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

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-100">

                @forelse($leaveRequests as $leave)

                    <tr class="hover:bg-gray-50/50 transition-colors">

                        {{-- Leave Type --}}
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">
                            {{ $leave->leaveType->name }}
                        </td>

                        {{-- From --}}
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $leave->from_date->format('d-m-Y') }}
                        </td>

                        {{-- To --}}
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $leave->to_date->format('d-m-Y') }}
                        </td>

                        {{-- Reason --}}
                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs whitespace-normal">

                            {{ $leave->reason ?? '-' }}

                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4">

                            @if($leave->status === 'Approved')

                                <div class="space-y-1">

                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700">
                                        Approved
                                    </span>

                                    <p class="text-xs text-gray-500">
                                        Your leave has been approved.
                                    </p>

                                </div>

                            @elseif($leave->status === 'Rejected')

                                <div class="space-y-2">

                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700">
                                        Rejected
                                    </span>

                                    @if($leave->rejection_reason)

                                        <div class="max-w-sm rounded-lg bg-red-50 border border-red-100 px-3 py-2">

                                            <p class="text-xs font-semibold text-red-700">
                                                Rejection Reason
                                            </p>

                                            <p class="text-xs text-red-600 mt-1 whitespace-normal">
                                                {{ $leave->rejection_reason }}
                                            </p>

                                        </div>

                                    @endif

                                </div>

                            @else

                                <div class="space-y-1">

                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700">
                                        Pending
                                    </span>

                                    <p class="text-xs text-gray-500">
                                        Waiting for approval.
                                    </p>

                                </div>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="px-6 py-12 text-center">

                            <div class="text-gray-400 mb-3">

                                <svg class="mx-auto h-10 w-10"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.5"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 002-2H5a2 2 0 002 2v12a2 2 0 002 2z">
                                    </path>

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

</div>

@endsection