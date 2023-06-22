<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.2/dist/leaflet-search.min.css">
</head>
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
<body style="background-color: #00D145;">
<div id="app" class="p-4">
    <div style="display: flex; justify-content: center; align-items: center; flex-direction: row;">
        <h1>CaptureCompanion-App</h1>
        <h5>〜カメラマン位置情報検索アプリ〜</h5>
        <div style="margin: 60px; align-items: center;">
            <a class="navbar-brand" href="{{ url('/home') }}">
              @csrf
              <div class="animation_1" style="text-align: center;">
                <input type="submit" value="HOME" class="cute-button" id="title_sub_4">
              </div>
            </a>
        </div>
    </div>
    <div id="my-map" style="height:1000px;"></div>
</div>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.2/dist/leaflet-search.min.js"></script>
<script>

    window.addEventListener('load', () => {

        const tileLayerUrl = 'https://cyberjapandata.gsi.go.jp/xyz/pale/{z}/{x}/{y}.png';
        const attribution = '<a href="https://www.gsi.go.jp/kikakuchousei/kikakuchousei40182.html" target="_blank" rel="noopener">国土地理院</a>';

        const map = L.map('my-map').setView([35.71006814475588, 139.81069905886525], 15); // スタートは東京スカイツリー
        L.tileLayer(tileLayerUrl, { attribution: attribution }).addTo(map);
        L.control.search({
            url: '{{ route('station.list') }}?keyword={s}',
            position: 'topright',
            textErr: '候補が見つかりませんでした',
            textPlaceholder: '駅名で検索...',
            textCancel: 'キャンセル'
        }).addTo(map);

    });

</script>
</body>
</html>