@extends('layouts.app')

@section('title', 'Apply for Leave')
@section('header', 'Apply for Leave')

@section('content')

<div class="max-w-4xl mx-auto">

    <!-- Page Intro -->
    <div class="mb-6">
        <div class="flex items-center gap-3">

            <div class="w-11 h-11 rounded-xl bg-indigo-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-indigo-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2 0 002-2V7a2 2 0 002-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>

                </svg>
            </div>

            <div>
                <h3 class="text-xl font-bold text-gray-800">
                    Leave Application
                </h3>

                <p class="text-sm text-gray-500">
                    Submit your leave request for approval.
                </p>
            </div>

        </div>
    </div>


    <!-- Main Card -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">


        <!-- Card Header -->
        <div class="px-8 py-6 bg-gradient-to-r from-indigo-50 to-purple-50 border-b border-gray-100">

            <div class="flex items-center justify-between">

                <div>
                    <h4 class="text-lg font-semibold text-gray-800">
                        Request Leave
                    </h4>

                    <p class="text-sm text-gray-500 mt-1">
                        Fill in the details below to submit your leave request.
                    </p>
                </div>

                <div class="hidden sm:flex items-center justify-center w-12 h-12 rounded-xl bg-white shadow-sm">

                    <svg class="w-6 h-6 text-indigo-600"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>

                    </svg>

                </div>

            </div>

        </div>


        <!-- Form -->
        <form action="{{ route('leave.store') }}"
              method="POST"
              class="p-8">

            @csrf


            <!-- Validation Errors -->
            @if($errors->any())

                <div class="mb-7 bg-red-50 border border-red-200 rounded-xl p-4">

                    <div class="flex items-start">

                        <svg class="w-5 h-5 text-red-500 mt-0.5 mr-3 flex-shrink-0"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>

                        </svg>

                        <div>

                            <p class="text-sm font-semibold text-red-800">
                                Please check the following:
                            </p>

                            <ul class="mt-2 list-disc list-inside text-sm text-red-700 space-y-1">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    </div>

                </div>

            @endif


            <!-- Section: Leave Details -->
            <div class="mb-8">

                <div class="flex items-center gap-2 mb-5">

                    <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center">

                        <svg class="w-4 h-4 text-indigo-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5a3 3 0 016 0">
                            </path>

                        </svg>

                    </div>

                    <h5 class="text-base font-semibold text-gray-800">
                        Leave Details
                    </h5>

                </div>


                <!-- Leave Type -->
                <div>

                    <label for="leave_type_id"
                           class="block text-sm font-semibold text-gray-700 mb-2">

                        Leave Type
                        <span class="text-red-500">*</span>

                    </label>

                    <select
                        name="leave_type_id"
                        id="leave_type_id"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-gray-700 text-sm shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition">

                        <option value="">
                            Select the type of leave
                        </option>

                        @foreach($leaveTypes as $leaveType)

                            <option
                                value="{{ $leaveType->id }}"
                                {{ old('leave_type_id') == $leaveType->id ? 'selected' : '' }}>

                                {{ $leaveType->name }}

                            </option>

                        @endforeach

                    </select>

                    <p class="mt-2 text-xs text-gray-400">
                        Select the appropriate leave type for your request.
                    </p>

                </div>

            </div>


            <!-- Section: Leave Duration -->
            <div class="mb-8">

                <div class="flex items-center gap-2 mb-5">

                    <div class="w-8 h-8 rounded-lg bg-purple-50 flex items-center justify-center">

                        <svg class="w-4 h-4 text-purple-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2 0 002-2V7a2 2 0 00-2 2v12a2 2 0 002 2 0 002-2z">
                            </path>

                        </svg>

                    </div>

                    <h5 class="text-base font-semibold text-gray-800">
                        Leave Duration
                    </h5>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    <!-- From Date -->
                    <div>

                        <label for="from_date"
                               class="block text-sm font-semibold text-gray-700 mb-2">

                            From Date
                            <span class="text-red-500">*</span>

                        </label>

                        <div class="relative">

                            <input
                                type="date"
                                name="from_date"
                                id="from_date"
                                value="{{ old('from_date') }}"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-gray-700 text-sm shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition">

                        </div>

                    </div>


                    <!-- To Date -->
                    <div>

                        <label for="to_date"
                               class="block text-sm font-semibold text-gray-700 mb-2">

                            To Date
                            <span class="text-red-500">*</span>

                        </label>

                        <div class="relative">

                            <input
                                type="date"
                                name="to_date"
                                id="to_date"
                                value="{{ old('to_date') }}"
                                required
                                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-gray-700 text-sm shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition">

                        </div>

                    </div>

                </div>

            </div>


            <!-- Section: Reason -->
            <div class="mb-8">

                <div class="flex items-center gap-2 mb-5">

                    <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center">

                        <svg class="w-4 h-4 text-amber-600"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-8.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 8.5-8.5z">
                            </path>

                        </svg>

                    </div>

                    <h5 class="text-base font-semibold text-gray-800">
                        Reason for Leave
                    </h5>

                </div>


                <label for="reason"
                       class="block text-sm font-semibold text-gray-700 mb-2">

                    Reason
                    <span class="text-gray-400 font-normal">
                        (Optional)
                    </span>

                </label>

                <textarea
                    name="reason"
                    id="reason"
                    rows="5"
                    maxlength="1000"
                    placeholder="Please provide a brief reason for your leave..."
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-gray-700 text-sm shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 transition resize-none">{{ old('reason') }}</textarea>

                <div class="flex justify-between mt-2">

                    <p class="text-xs text-gray-400">
                        Maximum 1000 characters.
                    </p>

                    <p class="text-xs text-gray-400">
                        Optional
                    </p>

                </div>

            </div>


            <!-- Information Box -->
            <div class="mb-8 bg-indigo-50 border border-indigo-100 rounded-xl p-4">

                <div class="flex items-start">

                    <svg class="w-5 h-5 text-indigo-500 mt-0.5 mr-3 flex-shrink-0"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M12 21a9 9 0 100-18 9 9 0 000 18z">
                        </path>

                    </svg>

                    <div>

                        <p class="text-sm font-semibold text-indigo-800">
                            Leave Request Information
                        </p>

                        <p class="text-xs text-indigo-600 mt-1 leading-relaxed">
                            Your leave request will be submitted as
                            <span class="font-semibold">Pending</span>
                            and will require approval from the administrator.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Buttons -->
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-6 border-t border-gray-100">

                <a href="{{ route('leave.index') }}"
                   class="inline-flex justify-center items-center px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 transition-colors">

                    <svg class="w-4 h-4 mr-2"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12">
                        </path>

                    </svg>

                    Cancel

                </a>


                <button
                    type="submit"
                    class="inline-flex justify-center items-center px-6 py-2.5 bg-indigo-600 rounded-xl font-medium text-white text-sm shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">

                    <svg class="w-4 h-4 mr-2"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
                        </path>

                    </svg>

                    Submit Leave Request

                </button>

            </div>

        </form>

    </div>

</div>

@endsection