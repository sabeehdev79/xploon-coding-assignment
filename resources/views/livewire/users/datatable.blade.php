<div>
<button wire:click="$refresh">Refresh</button>
    <table class="table-auto border-collapse border border-slate-400 ...">
        <thead>
            <tr>
                <th class="border border-slate-300 ...">ID</th>
                <th class="border border-slate-300 ...">First Name</th>
                <th class="border border-slate-300 ...">Last Name</th>
                <th class="border border-slate-300 ...">Email</th>
                <th class="border border-slate-300 ...">Date</th>
            </tr>
        </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border border-slate-300 ...">{{$user['external_id']}}</td>
                                <td class="border border-slate-300 ...">{{$user['first_name']}}</td>
                                <td class="border border-slate-300 ...">{{$user['last_name']}}</td>
                                <td class="border border-slate-300 ...">{{$user['email']}}</td>
                                <td class="border border-slate-300 ...">{{date('d M, Y',$user['joining_date'])}}</td>
                            </tr> 
                        @endforeach                           
                    </tbody>
                </table>
</div>
