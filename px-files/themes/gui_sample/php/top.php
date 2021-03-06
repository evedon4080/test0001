<?php
/**
 * theme "pickles"
 */
namespace pickles2\themes\pickles;

/**
 * theme "pickles" class
 */
class theme_top{
	/**
	 * objects
	 */
	private $px, $theme;

	/**
	 * constructor
	 * @param object $px $px object
	 * @param object $theme $theme object
	 */
	public function __construct( $px, $theme ){
		$this->px = $px;
		$this->theme = $theme;
		// $this->px->path_theme_files('css/common.css');
		// $this->px->path_theme_files('css/layout.css');
		// $this->px->path_theme_files('css/modules_custom.css');
	}//__construct()


	/**
	 * カラースキームを取得
	 * @return array カラースキーム
	 */
	public function get_color_scheme(){
		$colors = array();
		$colors['main'] = '#00a0e6';
		$hsb = [
			"h"=>198,
			"s"=>100,
			"b"=>90
		];
		$colors['thin'] = "#bae5f8";

		$colors['link'] = $colors['main'];
		$colors['text'] = '#333';
		$colors['white'] = '#fff';
		$colors['black'] = '#333';

		if( $hsb['s'] < 50 && $hsb['b'] > 50 ){
			// $colors['link'] = '#00f';
			$colors['thin'] = $colors['main'];
			$colors['link'] = '#000';
			$colors['white'] = '#333';
			$colors['black'] = '#fff';
		}
		return $colors;
	}//get_color_scheme()

	/**
	 * リンクアイコンのSVGロゴソースを返す。
	 * @param array $type アイコンの種類
	 *
	 * blank, download, pdf, up, down, back, icon(default) のいずれかを指定。
	 * @param array $opt オプション
	 * @return string SVGソース
	 */
	public function create_src_link_icon_uri($type, $opt = array()){
		$colors = $this->get_color_scheme();
		if( is_array(@$opt['colors']) ){
			foreach( $opt['colors'] as $key=>$val ){
				$colors[$key] = $val;
			}
		}
		$colors['linkx'] = '#fff';
		$tpl = null;
		switch($type){
			case 'blank':
				$tpl = 'blank';
				break;
			case 'download':
				$tpl = 'download';
				break;
			case 'pdf':
				$tpl = 'pdf';
				break;
			case 'up':
				$points = '3.631,9.183 7.001,3.817 10.369,9.183';
				break;
			case 'down':
				$points = '10.369,3.817 6.999,9.183 3.631,3.817';
				break;
			case 'back':
				$points = '9.683,9.869 4.317,6.499 9.683,3.131';
				break;
			case 'icon':
			default:
				$type = 'icon';
				$tpl = 'icon';
				$points = '4.317,3.131 9.683,6.501 4.317,9.869';
				break;
		}
		ob_start();
		if( $tpl == 'blank' ){?>
<svg version="1.1" id="link_<?php print htmlspecialchars($type); ?>" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="13px" viewBox="0 0 14 13" enable-background="new 0 0 14 13" xml:space="preserve">
<g><path fill="<?php print htmlspecialchars($colors['link']); ?>" d="M0,3v10h10V3H0z M9,12H1V6h8V12z"/><rect x="1" y="6" fill="<?php print htmlspecialchars($colors['linkx']); ?>" width="8" height="6" /></g>
<g><path fill="<?php print htmlspecialchars($colors['link']); ?>" d="M4,0v10h10V0H4z M13,9H5V3h8V9z"/><rect x="5" y="3" fill="<?php print htmlspecialchars($colors['linkx']); ?>" width="8" height="6" /></g>
</svg>
<?php }elseif( $tpl == 'download' ){ ?>
<svg version="1.1" id="link_<?php print htmlspecialchars($type); ?>" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="13px" viewBox="0 0 14 13" enable-background="new 0 0 14 13" xml:space="preserve">
<polygon fill="<?php print htmlspecialchars($colors['link']); ?>" points="13,8 13,12 1,12 1,8 0,8 0,13 14,13 14,8 "/>
<polygon fill="<?php print htmlspecialchars($colors['link']); ?>" points="10.062,7.093 10.062,0.968 3.938,0.968 3.938,7.093 1.824,7.093 7,11.031 12.176,7.093 "/>
</svg>
<?php }elseif( $tpl == 'pdf' ){ ?>
<svg version="1.1" id="link_<?php print htmlspecialchars($type); ?>" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="14px" height="13px" viewBox="0 0 14 13" enable-background="new 0 0 14 13" xml:space="preserve">
<path fill="<?php print htmlspecialchars($colors['link']); ?>" d="M1,0v13h12V0H1z"/>
<g>
	<path fill="<?php print htmlspecialchars($colors['linkx']); ?>" d="M2.021,8.398V4.602h1.433c0.252,0,0.444,0.012,0.578,0.036C4.218,4.669,4.375,4.729,4.5,4.814
		c0.126,0.088,0.227,0.21,0.304,0.367C4.882,5.34,4.92,5.512,4.92,5.7c0,0.321-0.103,0.595-0.308,0.82
		C4.406,6.743,4.035,6.855,3.498,6.855H2.524v1.543H2.021z M2.524,6.407h0.982c0.324,0,0.555-0.062,0.691-0.183
		s0.205-0.29,0.205-0.51c0-0.159-0.04-0.295-0.12-0.408C4.201,5.194,4.096,5.12,3.964,5.083C3.88,5.061,3.723,5.049,3.496,5.049
		H2.524V6.407z"/>
	<path fill="<?php print htmlspecialchars($colors['linkx']); ?>" d="M5.56,8.398V4.602h1.308c0.295,0,0.521,0.018,0.676,0.054c0.218,0.051,0.403,0.141,0.557,0.272
		c0.2,0.168,0.351,0.385,0.449,0.649c0.1,0.264,0.149,0.563,0.149,0.901c0,0.288-0.033,0.545-0.101,0.768
		C8.531,7.468,8.445,7.653,8.34,7.799S8.118,8.061,7.993,8.144S7.717,8.292,7.54,8.333C7.363,8.378,7.16,8.398,6.93,8.398H5.56z
		 M6.062,7.95h0.811c0.25,0,0.447-0.023,0.59-0.069s0.256-0.113,0.341-0.197c0.118-0.119,0.211-0.279,0.277-0.481
		c0.067-0.201,0.101-0.444,0.101-0.731c0-0.396-0.065-0.701-0.196-0.915C7.855,5.343,7.697,5.2,7.51,5.127
		C7.376,5.075,7.159,5.049,6.86,5.049H6.062V7.95z"/>
	<path fill="<?php print htmlspecialchars($colors['linkx']); ?>" d="M9.417,8.398V4.602h2.562v0.447H9.92v1.176h1.782v0.448H9.92v1.726H9.417z"/>
</g>
</svg>
<?php }else{ ?>
<svg version="1.1" id="link_<?php print htmlspecialchars($type); ?>" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14px" height="13px" viewBox="0 0 14 13" enable-background="new 0 0 14 13" xml:space="preserve">
<rect y="2" width="14" height="9" fill="<?php print htmlspecialchars($colors['link']); ?>" />
<polygon fill="<?php print htmlspecialchars($colors['linkx']); ?>" points="<?php print htmlspecialchars($points); ?>"/>
</svg>
<?php
		}
		return 'data:image/svg+xml;base64,'.base64_encode( ob_get_clean() );
	}//create_src_link_icon_uri()


	/**
	 * welcomeイメージのソースを返す。
	 * @param array $opt オプション
	 * @return string SVGソース
	 */
	public function create_src_welcome_svg($opt = array()){
		$colors = $this->get_color_scheme();
		if( @strlen($opt['color']) ){
			$colors['mainx'] = $opt['color'];
		}
		$svg_src = file_get_contents( __DIR__.'/svg/welcome.svg' );
		$svg_src = str_replace( '#0000ff', htmlspecialchars($colors['link']), $svg_src );
		return $svg_src;
	}//create_src_welcome_svg()



	/**
	 * セットアップを検証する
	 * @return array エラーの一覧。エラーがない場合は、空白の配列 `array()` が返ります。
	 */
	public function setup_test(){
		$errors = array();

		// システムディレクトリの確認
		$sysdirs = array(
			'_sys/ram/' ,
			'_sys/ram/applock/' ,
			'_sys/ram/caches/' ,
			'_sys/ram/publish/' ,
			'_sys/ram/data/' ,
		);
		foreach( $sysdirs as $sysdir ){
			$realpath = $this->px->fs()->get_realpath( $this->px->get_path_homedir().$sysdir );
			if( !is_dir( $realpath ) ){
				array_push( $errors, 'システムディレクトリ '.htmlspecialchars($realpath).' が存在しません。' );
			}elseif( !is_writable( $realpath ) ){
				array_push( $errors, 'システムディレクトリ '.htmlspecialchars($realpath).' に書き込み許可がありません。' );
			}
		}

		// 公開キャッシュディレクトリの確認
		$realpath = $this->px->fs()->get_realpath( './'.$this->px->conf()->public_cache_dir.'/' );
		if( !is_dir( $realpath ) ){
			array_push( $errors, '公開キャッシュディレクトリ '.htmlspecialchars($realpath).' が存在しません。' );
		}elseif( !is_writable( $realpath ) ){
			array_push( $errors, '公開キャッシュディレクトリ '.htmlspecialchars($realpath).' に書き込み許可がありません。' );
		}
		return $errors;
	}

	/**
	 * セットアップ検証結果を表示する
	 * @param array $errors `setup_test()` が返したエラー一覧
	 * @return string HTMLソース
	 */
	public function mk_setup_test( $errors = array() ){
		// 結果のエラーメッセージ(または成功メッセージ)を生成して返す。
		$rtn = '';
		if( count($errors) ){
			$rtn .= '<h2>エラー</h2>';
			$rtn .= '<p>Pickles Framework のセットアップに、一部不備があります。<br />次の項目を確認してください。</p>';
			$rtn .= '<ul>';
			foreach( $errors as $error ){
				$rtn .= '<li>'.htmlspecialchars($error).'</li>';
			}
			$rtn .= '</ul>';

		}else{
			$rtn .= '<p>おめでとうございます！<br />Pickles Framework のセットアップは正常に完了しました。</p>';
		}
		return $rtn;
	}
}
