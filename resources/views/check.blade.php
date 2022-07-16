@extends('layouts.default')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/check.css') }}">
@endsection

@section('content')
  <main class="main">
    <h1 class="title">内容確認</h1>
    <form action="/form/store" method="POST" class="form">
      @csrf
      <!--            お名前             -->
      <div class="item">
        <label class="label">お名前</label>
        <p>{{$fullname}}</p>
        <input type="hidden" name="fullname" value="{{$fullname}}">
      </div>
      <!--            性別             -->
      <div class="item">
        <label class="label">性別</label>
        @if($confirm['gender'] == 1)
          <p>男性</p>
          @else
          <p>女性</p>
        @endif
        <input type="hidden" name="gender" value="{{$confirm['gender']}}">
      </div>
      <!--           メールアドレス              -->
      <div class="item">
        <label class="label">メールアドレス</label>
        <p>{{$confirm['email']}}</p>
        <input type="hidden" name="email" value="{{$confirm['email']}}">
      </div>
      <!--            郵便番号             -->
      <div class="item">
        <label class="label">郵便番号</label>
        <p>{{$confirm['postcode']}}</p>
        <input type="hidden" name="postcode" value="{{$confirm['postcode']}}">
      </div>
      <!--            住所             -->
      <div class="item">
        <label class="label">住所</label>
        <p>{{$confirm['address']}}</p>
        <input type="hidden" name="address" value="{{$confirm['address']}}">
      </div>
      <!--            建物名             -->
      <div class="item">
        <label class="label">建物名</label>
        <p>{{$confirm['building_name']}}</p>
        <input type="hidden" name="building_name" value="{{$confirm['building_name']}}">
      </div>
      <!--            ご意見             -->
      <div class="item">
        <label class="label">ご意見</label>
        <p>{{$confirm['opinion']}}</p>
        <input type="hidden" name="opinion" value="{{$confirm['opinion']}}">
      </div>
      <input type="submit" name="submit" value="送信" class="submit">
      <button type="submit" name="back" value="back" class="fix">修正する</button>
    </form>
  </main>
@endsection