@extends('layouts.app')

@section('content')
<style>
  .cute-button {
      background-color: pink;
      color: #000000;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;

    }

    .cute-button:hover {
      background-color: #0ee74c;
    }
    .animation_1 {
      animation-name: anim_v;
      animation-timing-function: ease-in-out;
      animation-iteration-count: infinite;
      animation-duration: 2.5s;
    }

    @keyframes anim_v {
    0% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-10px);
    }
    100% {
      transform: translateY(0);
    }
    }
</style>
<div class="p-user-index">
  <div class="tphoto">
    {{-- ユーザー写真表示 --}}
    <img src="{{ asset($user->img_url) }}" title="tphoto" alt="Tinder Photo">
    <div class="tname">{{$user->name }}</div>
  </div>

  <div class="tcontrols">
    <div class="container">
      <div class="row">
          <div class="col-md-6 mb-1">
            <form action="{{ route('swipes.store') }}" method="POST">
              @csrf
              {{-- コントーラー側に送るデータ to_user_id is_like --}}
                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                <input type="hidden" name="is_like" value="0">
                <button class="tno" type="submit">
                  <i class="fa fa-times fa-bounce" aria-hidden="true"></i>
                </button>
              </form>
          </div>
          <div class="col-md-6 mb-1">
            <form action="{{ route('swipes.store') }}" method="POST">
              @csrf
                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                <input type="hidden" name="is_like" value="1">
                <button class="tyes" type="submit">
                  <i class="fa fa-heart fa-bounce" aria-hidden="true"></i>
                </button>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>
<div style="margin: 60px; align-items: center;">
  <a class="navbar-brand" href="{{ url('/home') }}">
    @csrf
    <div class="animation_1" style="text-align: center;">
      <input type="submit" value="HOME" class="cute-button" id="title_sub_4">
    </div>
  </a>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
/*#000000形式でランダム色を返すプログラム
=======================================================================*/
function getRumClr(){
    // 0～9、a～fの16進数の配列を用意
	var clrArr = ['0','1','2','3','4','5','6','7','8','9','a','b','c','d','e','f'];
	var clr = '#';
	for(i=0; i < 6; i++){ //「for」で6回繰り返して「#000000」の形にする。
		clr = clr + clrArr[Math.floor( Math.random() * 16)];
	}
	return clr;
}

$(function(){
	// jQuery('p').css({'color':getRumClr()});
	jQuery('#title_sub_4').css({'color':getRumClr()});
});
    </script>