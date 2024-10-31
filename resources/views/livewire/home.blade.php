<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Amount
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Donation Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($donations as $donation)
                    <tr
                        class="text-center border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $donation->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $donation->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $donation->amount }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $donation->donation_type }}
                        </td>
                        <td>
                            {{ $donation->status ? 'Success' : 'Failed' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $donation->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 text-center">
                            No donations found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
