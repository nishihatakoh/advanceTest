@extends('layouts.default')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/manage.css') }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
<!--                     　　管理システム　　　                        -->
<div class="main">
  <h1 class="main-ttl">管理システム</h1>
  <div class="find">
    <form action="/manage/find" method="POST" class="find_form">
      @csrf
      <div class="items">
        <!-- お名前 -->
        <div class="item">
          <p class="label">お名前</p>
          <input type="text" name="keyword" value="{{ old('keyword') }}" class="input">
        </div>
        <!-- 性別 -->
        <div class="item">
          <p class="label">性別</p>
          <input type="radio" name="gender" value="" checked="checked" class="radio"><label class="gender">全て</label>
          <input type="radio" name="gender" value="1" class="radio"><label class="gender">男性</label>
          <input type="radio" name="gender" value="2" class="radio"><label class="gender">女性</label>
        </div>
      </div>
      <!-- 登録日 -->
      <div class="item">
        <p class="label">登録日</p>
        <input type="date" name="from" class="input date">
        <label class="from">~</label>
        <input type="date" name="until" class="input date">
      </div>
      <!-- メールアドレス -->
      <div class="item">
        <p class="label">メールアドレス</p>
        <input type="text" name="email" class="input" value="{{ old('email') }}">
      </div>
      <input type="submit" value="検索" class="button">
      <a href="/manage" class="reset">リセット</a>
    </form>
  </div>
  <!-- 　　　　　　　　　　　　　データ一覧　　　　　　　　　　　　　　 -->
  {{ $items->links() }}
  <table>
    <tr>
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th class="opinion">ご意見</th>
      <th></th>
    </tr>
    @foreach($items as $item)
    <tr>
      <td>{{$item->id}}</td>
      <td>{{$item->fullname}}</td>
      <td>
        @if($item['gender'] == 1)
          <p>男性</p>
          @else
          <p>女性</p>
        @endif
      </td>
      <td>{{$item->email}}</td>
      <td class="opinion"><p class="opinion-sentence">{{$item->opinion}}</p></td> 
      <td>
        <form action="{{ route('manage.delete', ['id' => $item->id]) }}" method="post">
          @csrf
          <input type="submit" value="削除" class="buttom_delete">
        </form>
      </td> -->
    </tr>
    @endforeach
  </table>

</div>
@endsection