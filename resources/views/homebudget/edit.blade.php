<html>
<head>
    <meta charset="UTF-8">
    <title>家計簿アプリ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>支出編集</h1>
    </header>
    <div class="edit-page">
        <div class="form-balance edit-balance">
            <form action="{{route('homebudget.update')}}" method="POST">
                @csrf
                @method('put')
                <input type="hidden"  id="id" name="id" value="{{$homebudget ->id}}">
                <label for="date">日付:</label>
                <input type="date" id="date" name="date" value="{{$homebudget ->date}}">
                
                <label for="category_id">カテゴリ:</label>
                <select name="category_id" id="category_id">
                     @foreach($budgetcategories as $budgetcategory)
                    <option value="{{$budgetcategory->id}}" {{$budgetcategory->id==$homebudget->category_id ? 'selected' : ''}}>
                        {{$budgetcategory->name}}</option>
                    @endforeach
                </select>
                <label for="price">金額:</label>
                <input type="text" id="price" name="price"  value="{{$homebudget ->price}}">
                <div class="button-container">    
                <button type="submit" class="edit-button">更新</button>
                    <input type="button"  class="back-button" value="戻る" onclick="window.location.href='{{ url('/') }}'">
                </div>
            </form>
        </div>
    </div>
</body>
</html>