<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>家計簿アプリ</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
    <header>
        <h1>家計簿アプリ</h1>
    </header>

    <section class="container">
        <div class="balance">
            <h3>支出一覧</h3>
            @if(session('flash_message'))
                <div class="flash_message">
                 {{ session('flash_message')}}
                </div>
            @endif
            @if(session('flash_error_message'))
                <div class="flash_error_message">
                {{ session('flash_error_message')}}
                </div>
            @endif
            <table>
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>カテゴリ</th>
                        <th>金額</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- 支出データのループ処理 -->
                     @foreach($homebudgets as $homebudget)
                     <tr>
                        <td>{{$homebudget ->date}}</td>
                        <td>{{$homebudget ->category ->name}}</td>
                        <td>{{$homebudget ->price}}</td>
                        <td class="button-td">
                            <form action="{{route('homebudget.edit',['id'=>$homebudget->id])}}" method="">
                                <input type="submit" value="更新" class="edit-button">
                            </form>
                            <form action="{{route('homebudget.destroy',['id'=>$homebudget->id])}}" method="POST">
                                @csrf
                                <input type="submit" value="削除" class="delete-button">
                            </form>
                        </td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
            <div>
                {{$homebudgets->links()}}
            </div>
        </div>
        <div class="add-balance">
            <h3>支出の追加</h3>
            <form action="{{route('store')}}"  method="POST">
                @csrf
                <label for="date">日付:</label>
                <input type="date" id="date" name="date">
                <label for="category">カテゴリ:</label>
                <select name="category" id="category">
                    @foreach($budgetcategories as $budgetcategory)
                    <option value="{{$budgetcategory->id}}">{{$budgetcategory->name}}</option>
                    @endforeach
                    </select>
                <label for="price">金額:</label>
                <input type="text" id="price" name="price">
                <button type="submit">追加</button>
            </form>
        </div>
    </section>
</body>
</html>