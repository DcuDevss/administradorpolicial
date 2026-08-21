<div class="space-y-8">

        <div class="mb-6">

             <input
                type="text"
                wire:model="search"
                placeholder="Buscar usuario..."
                class="w-full"
                >

        </div>

    <div>

        <h2 class="text-lg font-semibold mb-4">
            Usuarios que aceptaron
            ({{ $accepted->count() }})
        </h2>

        <table>
            <thead>
                <tr>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Versión</th>
                    <th class="text-center">Fecha aceptación</th>
                </tr>
            </thead>

            <tbody>

                @foreach($accepted as $acceptance)

                    <tr>

                        <td class="text-center">
                            {{ $acceptance->user->name }}
                        </td>

                        <td class="text-center">
                            {{ $acceptance->termsCondition->version }}
                        </td>

                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($acceptance->accepted_at)->format('d/m/Y H:i') }}
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div>

        <div class="mb-6">

             <input
                type="text"
                wire:model="search"
                placeholder="Buscar usuario..."
                class="w-full"
                >

        </div>
        
        <h2 class="text-lg font-semibold mb-4">
            Usuarios pendientes
            ({{ $pending->count() }})
        </h2>

        <table>

            <thead>
                <tr>
                    <th class="text-center">
                        Usuario
                    </th>
                </tr>
            </thead>

            <tbody>

                @foreach($pending as $user)

                    <tr>

                        <td class="text-center">
                            {{ $user->name }}
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>
