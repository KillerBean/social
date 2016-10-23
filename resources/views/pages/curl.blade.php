@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-*">
			<div id="x-language" style="display:none;">pt</div>
			<div id="x-quotes" style="display:none;">Cotações</div>
			<script type="text/javascript">
			  function get_lang() {
			    return document.getElementById("x-language").textContent;
			  }
			  function get_param(name, default_value){
				if(name=(new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search))
				var decoded_param = decodeURIComponent(name[1]); 
				if (decoded_param) return decoded_param;
				return default_value;
			  }
			</script>
			<div class="large-12 columns show-for-medium-up">
			<!-- TradingView Widget BEGIN  medium up -->
				<div id="tv-adv-widget-home">
					<div id="tradingview_c97aa-wrapper" style="position: relative;box-sizing: content-box;width: 100%;height: 450px;margin: 0 auto !important;padding: 0 !important;font-family:Arial,sans-serif;">
					<div style="width: 100%;height: 450px;background: transparent;padding: 0 !important;">
						<iframe id="tradingview_c97aa" src="https://dwq4do82y8xi7.cloudfront.net/bovespa/widgetembed/?symbol=IBOV&amp;interval=1&amp;hidesidetoolbar=0&amp;symboledit=1&amp;saveimage=1&amp;toolbarbg=f1f3f6&amp;editablewatchlist=1&amp;details=1&amp;studies=&amp;widgetbarwidth=300&amp;hideideas=1&amp;theme=White&amp;style=3&amp;timezone=exchange&amp;withdateranges=1&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=pt&amp;utmsource=www.bmfbovespa.com.br&amp;utmmedium=www.bmfbovespa.com.br/pt_br/servicos/market-data/cotacoes/" width="100%" height="450px" frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen="">
						</iframe>
					</div>
					<a href="https://www.tradingview.com/?utm_source=www.bmfbovespa.com.br&amp;utm_medium=www.bmfbovespa.com.br/pt_br/servicos/market-data/cotacoes/" target="_blank" style="position: absolute; display: inline-block; left: 65px; bottom: 57px; width: 145px; height: 69px; background-color: transparent; pointer-events: none;"></a>
					</div>
				</div>
				<script type="text/javascript" src="https://s3.amazonaws.com/tradingview/tv.js"></script>
				<script type="text/javascript">
				  new TradingView.widget({
					"container_id": "tv-adv-widget-home",
					"width": "100%",
					"height": "450px",
					"symbol": get_param("symbol", get_param("tvwidgetsymbol", "IBOV")),
					"interval": "1",
					"timezone": "exchange",
					"theme": "White",
					"style": "3",
					"toolbar_bg": "#f1f3f6",
					"withdateranges": true,
					"hide_side_toolbar": false,
					"details": true,
					"allow_symbol_change": true,
					"hideideas": true,
					"widgetbar_width": 300,
					"show_popup_button": false,
					"popup_width": "100%",
					"popup_height": "450px",
					"editablewatchlist": true,
					"customer": "bovespa",
					"locale": get_lang()
				  });
				</script>
			<!-- TradingView Widget END -->
			</div>
			<div class="large-12 columns show-for-small-only">
			<!-- TradingView Widget BEGIN  small -->
			<div id="tv-mini-widget-home">
				<div id="tradingview_ce5e7-wrapper" style="position: relative;box-sizing: content-box;width: 100%;height: 253px;margin: 0 auto !important;padding: 0 !important;font-family:Arial,sans-serif;">
					<div style="width: 100%;height: 253px;background: #fff;padding: 0 !important;">
						<iframe id="tradingview_ce5e7" src="https://dwq4do82y8xi7.cloudfront.net/bovespa/miniwidgetembed/?Cota%C3%A7%C3%B5es=IBOV&amp;tabs=Cota%C3%A7%C3%B5es&amp;IBOV=IBOV%7C1d&amp;locale=pt&amp;activeTickerBackgroundColor=%23EDF0F3&amp;trendLineColor=%234bafe9&amp;underLineColor=%23dbeffb&amp;fontColor=%2383888D&amp;gridLineColor=%23E9E9EA&amp;width=100%25&amp;height=253px&amp;locale=pt&amp;utmsource=www.bmfbovespa.com.br&amp;utmmedium=www.bmfbovespa.com.br/pt_br/servicos/market-data/cotacoes/" width="100%" height="253px" frameborder="0" allowtransparency="true" scrolling="no" style="margin: 0 !important; padding: 0 !important;"></iframe>
					</div>
					<div style="position:absolute;display: block;box-sizing: content-box;height: 24px;width: 100%;bottom: 0;left: 0;margin: 0;padding: 0;font-family: Arial,sans-serif;">
						<div style="display: block;margin: 0 1px 1px 1px;line-height: 7px;box-sizing: content-box;height: 11px;padding: 6px 10px;text-align: right;background: #fff;">
							<a href="https://www.tradingview.com/?utmsource=www.bmfbovespa.com.br&amp;utmmedium=www.bmfbovespa.com.br/pt_br/servicos/market-data/cotacoes/" target="_blank" style="color: #0099d4;text-decoration: none;font-size: 11px;"><span style="color: #b4b4b4;font-size: 11px;">Quotes by</span> TradingView</a>
						</div>
					</div>
				</div>
			</div>
			<div id="x-quotes" style="display:none;">Cotações</div>
			<script type="text/javascript" src="https://s3.amazonaws.com/tradingview/tv.js"></script>
			<script type="text/javascript">
				var small_tab_name = document.getElementById("x-quotes").textContent;
				var small_tabs_dict = new Array();
				small_tabs_dict[0] = small_tab_name;
				var small_symbols_dict = new Array();
				small_symbols_dict[small_tab_name] = new Array();
				small_symbols_dict[small_tab_name].push([get_param("symbol", "IBOV"), get_param("symbol", "IBOV")+"|1d"]);
				
			    new TradingView.MiniWidget({
			      "container_id": "tv-mini-widget-home",
			      "tabs": small_tabs_dict,
			      "symbols": small_symbols_dict,
			      "gridLineColor": "#E9E9EA",
			      "fontColor": "#83888D",
			      "underLineColor": "#dbeffb",
			      "trendLineColor": "#4bafe9",
			      "activeTickerBackgroundColor": "#EDF0F3",
			      "noGraph": false,
			      "width": "100%",
			      "height": "253px",
			      "customer": "bovespa",
			      "locale": get_lang()
			    });
				</script>
			<!-- TradingView Widget END -->
			</div>
		</div>
	</div>
</div>

@endsection