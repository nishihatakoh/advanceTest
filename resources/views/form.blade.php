@extends('layouts.default')
<script type="text/javascript" src="https://ajaxzip3.github.io/ajaxzip3.js" charset="utf-8"></script>

@section('css')
  <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endsection

@section('content')
  <main class="main">
    <h1 class="title">お問い合わせ</h1>
    <div class="form">
      <form action="/form/check" method='POST'>
        @csrf
        <!--       名前        -->
        <div class="item">
          <label class="label">お名前<span>※</span></label>
          <div class="input_name">
            <div class="input_name_items">
              <input class="input_name_item" type="text" name="last_name" value="{{old('last_name')}}" required>
              <p class="example">例）山田</p>
            </div>
            <div class="input_name_items">
              <input class="input_name_item" type="text" name="first_name" value="{{old('first_name')}}" required>
              <p class="example">例）太郎</p>
            </div>
          </div>
        </div>
        @if ($errors->has('last_name'))
          <p class="error">{{$errors->first('last_name')}}</p>
        @endif
        @if ($errors->has('first_name'))
          <p class="error">{{$errors->first('first_name')}}</p>
        @endif
        <!--         性別           -->
        <div class="item">
          <p class="label">性別<span>※</span></p>
          <div class="gender-item">
            <input class="radio" type="radio" name="gender" value="1" checked="checked"><label class="gender">男性</label>
            <input class="radio" type="radio" name="gender" value="2" ><label class="gender">女性</label>
          </div>
        </div>
        @if ($errors->has('gender'))
          <p class="error">{{$errors->first('gender')}}</p>
        @endif
        <!--         メールアドレス           -->
        <div class="item">
          <label class="label">メールアドレス<span>※</span></label>
          <div class="input">
            <input class="input_item" type="email" name="email" value="{{old('email')}}" required>
            <p class="example">例）test@exanple.com</p>
          </div>
        </div>
        @if ($errors->has('email'))
          <p class="error">{{$errors->first('email')}}</p>
        @endif
        <!--         郵便番号           -->
        <div class="item">
          <label class="label">郵便番号<span>※</span></label>
          <div class="input_postcode">
            <p>〒</p>
            <div>
              <input class="input_item" type="text" name="postcode" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" value="{{old('postcode')}}"  required>
              <p class="example">例）123-4567</p>
            </div>
          </div>
        </div>
        @if ($errors->has('postcode'))
          <p class="error">{{$errors->first('postcode')}}</p>
        @endif
        <!--           住所           -->
        <div class="item">
          <label class="label">住所<span>※</span></label>
          <div class="input">
            <input class="input_item" type="text" name="address" value="{{old('address')}}" required>
            <p class="example">例）東京都渋谷区千駄ヶ谷1-2-3</p>
          </div>
        </div>
        @if ($errors->has('address'))
          <p class="error">{{$errors->first('address')}}</p>
        @endif
        <!--           建物名         　-->
        <div class="item">
          <label class="label">建物名</label>
          <div class="input">
            <input class="input_item" type="text" name="building_name"value="{{old('building_name')}}">
            <p class="example">例）千駄ヶ谷マンション101</p>
          </div>
        </div>
        <!--           ご意見            -->
        <div class="item">
          <label class="label">ご意見<span>※</span></label>
          <textarea class="input" name="opinion" cols="30" rows="6" required>{{ old('opinion') }}</textarea>
        </div>
        @if ($errors->has('opinion'))
          <p class="error">{{$errors->first('opinion')}}</p>
        @endif
        <input class="button" type="submit" value="確認">
      </form>
    </div>
  </main>  
@endsection