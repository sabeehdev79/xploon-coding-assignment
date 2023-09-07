<div>
<button wire:click="$refresh" 
    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-700 hover:border-transparent rounded">
    Reload Data 
</button>
<br/><br/>

    <p x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 1000)">
        Loading data.......
    </p>
    <br/><br/>
    
    <table class="table-auto border-collapse border border-slate-400 ...">
        <thead> 
            <tr>
                <th class="border border-slate-300 px-4 py-2 ...">ID</th>
                <th class="border border-slate-300 px-4 py-2 ...">First Name</th>
                <th class="border border-slate-300 px-4 py-2 ...">Last Name</th>
                <th class="border border-slate-300 px-4 py-2 ...">Email</th>
                <th class="border border-slate-300 px-4 py-2 ...">Date</th>
            </tr>
        </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border border-slate-300 px-4 py-2 ...">
                                    {{$user['external_id']}}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 ...">
                                    {{$user['first_name']}}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 ...">
                                    {{$user['last_name']}}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 ...">
                                    {{$user['email']}}
                                </td>
                                <td class="border border-slate-300 px-4 py-2 ...">
                                    {{date('d M, Y',$user['joining_date'])}}
                                </td>
                            </tr> 
                        @endforeach                           
                    </tbody>
                </table>
</div>
