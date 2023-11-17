<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <h1>支出</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%">類型</th>
                                <th width="40%">金額</th>
                                <th width="20%">日期</th>
                                <th width="10%"></th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($out as $entry)
                                <tr>
                                    <td>{{ $entry->Items }}</td>
                                    <td>{{ $entry->Money }}</td>
                                    <td>{{ $entry->Time }}</td>
                                    <td>
                                        <!-- 第四列内容 -->
                                    </td>
                                    <td>
                                        <!-- 第五列内容 -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>