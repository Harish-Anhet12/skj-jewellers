<td class="px-6 py-4">
    <div class="flex items-center">
        <div class="flex-shrink-0 h-10 w-10">
            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center text-gray-600 font-bold">
                {{ substr($item->name, 0, 1) }}
            </div>
        </div>
        <div class="ml-4">
            <div class="text-sm font-medium text-gray-900">{{ $item->name }}</div>
            <div class="text-sm text-gray-500">{{ $item->email }}</div>
        </div>
    </div>
</td>
<td class="px-6 py-4 text-sm text-gray-500">
    @if($item->department)
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">{{ $item->department->name }}</span>
    @else
        <span class="text-gray-400 text-xs italic">None</span>
    @endif
</td>
<td class="px-6 py-4 text-sm text-gray-500">
    @if($item->role)
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">{{ $item->role->name }}</span>
    @else
        <span class="text-gray-400 text-xs italic">None</span>
    @endif
</td>