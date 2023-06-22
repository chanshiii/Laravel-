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

    .title_img {
      width: 300px;
      padding: 0 0 0 40px;
      animation-name: anim_v;
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
    .animation_1 {
      animation-name: anim_v;
      animation-timing-function: ease-in-out;
      animation-iteration-count: infinite;
      animation-duration: 2.5s;
    }

    @keyframes anim_rotate {
      0% {
        transform: rotate(0deg);
      }
      30% {
        transform: rotate(45deg);
      }
      60% {
        transform: rotate(-45deg);
      }
      100% {
        transform: rotate(0deg);
      }
    }

    .animation_2 {
      animation-name: anim_rotate;
      animation-timing-function: ease-in-out;
      animation-iteration-count: infinite;
      animation-duration: 5.5s;
    }

    @keyframes anim_translate {
      0% {
        transform: translateX(20px);
      }
      50% {
        transform: translateX(-20px);
      }
      100% {
        transform: translateX(20px);
      }
    }

    .animation_3 {
      animation-name: anim_translate;
      animation-timing-function: ease-in-out;
      animation-iteration-count: infinite;
      animation-duration: 2s;
    }

    /* @keyframes anim_slideIn {
      0% {
        transform: translateX(-100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    .animation_4 {
      animation-name: anim_slideIn;
      animation-timing-function: ease-in-out;
      animation-duration: 1s;
    } */
  </style>
  {{-- <div style="background-image: url('images/top.jpg'); background-size: cover;"> --}}
    <p id="title_sub_1" class="animation_1" style="color: white; font-weight: bold; text-align: center; font-size: 20px; line-height: 3em;">
    新感覚のマッチングアプリ
    </p>
    <p id="title_sub_2" class="animation_2" style="color: white; font-weight: bold; text-align: center; font-size: 30px; line-height: 2em;">
      Pic Partner！
    </p>
    <p id="title_sub_3" class="animation_1" style="color: white; font-weight: bold; text-align: center; font-size: 20px; line-height: 3em;">
    写真から理想の相手を見つけよう！<br>
    簡単操作でマッチングできる、<br>
    今までにない出会いの場を提供します。
    </p>
  {{-- </div> --}}
<a class="navbar-brand" href="{{ url('/users') }}">
    @csrf
    <div class="animation_3" style="text-align: center;">
      <input type="submit" value="カメラマンをさがず" class="cute-button" id="title_sub_4">
    </div>
</a>
<div>
<div class="animation_1" style="display: flex; justify-content: center; align-items: center; margin: 20px 0;">
    <img src="{{ asset('images/pic_img.png')}}" alt="テストアイコン" alt="" style="width: 200px;">
</div>
</div>
<form action="{{ route('logout') }}" method="post">
  @csrf
  <div class="animation_3" style="text-align: center;">
    <input type="submit" value="ログアウト" class="cute-button" id="title_sub_5">
  </div>
</form>
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
	jQuery('#title_sub_1').css({'color':getRumClr()});
	jQuery('#title_sub_2').css({'color':getRumClr()});
	jQuery('#title_sub_3').css({'color':getRumClr()});
  jQuery('#title_sub_4').css({'color':getRumClr()});
  jQuery('#title_sub_5').css({'color':getRumClr()});
});
    </script>
