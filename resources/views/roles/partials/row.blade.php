<td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $item->name }}</td>
<td class="px-6 py-4 text-sm">
    <div class="flex space-x-2">
        @if($item->can_create)<span class="px-2.5 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Create</span>@endif
        @if($item->can_read)<span class="px-2.5 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">Read</span>@endif
        @if($item->can_update)<span class="px-2.5 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Update</span>@endif
        @if($item->can_delete)<span class="px-2.5 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Delete</span>@endif
        @if(!$item->can_create && !$item->can_read && !$item->can_update && !$item->can_delete)
            <span class="text-gray-400 italic text-xs">No permissions</span>
        @endif
    </div>
</td>