<td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $item->name }}</td>
<td class="px-6 py-4 text-sm text-center">
    @if($item->can_dashboard)
        <span class="px-2.5 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Yes</span>
    @else
        <span class="px-2.5 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">No</span>
    @endif
</td>
<td class="px-6 py-4 text-sm text-center">
    @if($item->can_department)
        <span class="px-2.5 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Yes</span>
    @else
        <span class="px-2.5 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">No</span>
    @endif
</td>
<td class="px-6 py-4 text-sm text-center">
    @if($item->can_user)
        <span class="px-2.5 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Yes</span>
    @else
        <span class="px-2.5 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">No</span>
    @endif
</td>
<td class="px-6 py-4 text-sm text-center">
    @if($item->can_role)
        <span class="px-2.5 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Yes</span>
    @else
        <span class="px-2.5 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">No</span>
    @endif
</td>