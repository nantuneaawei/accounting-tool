<div class="container">
    <div class="row my-5">
        <div class="col-12">
            <h1>收入</h1>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="20%"></th>
                                <th width="40%">金額</th>
                                <th width="20%">日期</th>
                                <th width="10%"></th>
                                <th width="10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($in as $entry)
                                <tr>
                                    <td></td>
                                    <td>{{ $entry->Money_In }}</td>
                                    <td>{{ $entry->Time }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success">編輯</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success" id="delete_btn" data-id="{{ $entry->id }}">刪除</button>
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
