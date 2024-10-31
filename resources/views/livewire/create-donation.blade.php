<div>
    <h3 class="my-3 text-2xl font-semibold">Donation</h3>
    <form wire:submit.prevent='send'>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input wire:model="nama" type="text" id="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Name" required />
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input wire:model='email' type="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="example@gmail.com" required />
            </div>
            <div class="col-span-2">
                <label for="jenis_donasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Donasi</label>
                <select wire:model='donation_type' id="jenis_donasi"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>Jenis Donasi</option>
                    <option value="Kemanusiaan">Kemanusiaan</option>
                    <option value="Bencana Alam">Bencana Alam</option>
                    <option value="Rumah Ibadah">Rumah Ibadah</option>
                    <option value="Beasiswa & Pendidikan">Beasiswa & Pendidikan</option>
                    <option value="Sarana & Infrastruktur">Sarana & Infrastruktur</option>
                </select>
            </div>
            <div>
                <label for="jumlah"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah</label>
                <input wire:model='amount' type="number" id="jumlah"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="0" required />
            </div>
            <div>
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan
                    (Opsional)</label>
                <textarea wire:model='catatan' id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            </div>

            <button id="send" type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('CLIENT_KEY_MIDTRANS') }}"></script>
    @script
        <script>
            Livewire.on('snapTokenGenerated', (snapToken) => {
                console.log(snapToken);
                snap.pay(snapToken[0], {});
            });
        </script>
    @endscript
</div>
