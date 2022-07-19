<?php
namespace Fratello\System\Configure;

class settings{
    // アプリケーションの開発モード起動（trueの場合はエラー画面やデバッグ関数の使用が許可されます。）
    protected $IsDevMode = true;

    // アプリケーションのセーフモード起動（ミドルウェアの切り離しやリクエストにダミーデータを使用可能）
    protected $Safemode = false;

    // セッションモード（Fratello独自のセッション管理システムか、PHPデフォルトを使用するか）
    protected $SessionMode = 'Fratello';

    // Fratelloのセッション管理を使用する際の保存先（File、RDBが使用可能。RedisはPHPとFratello両者に拡張機能が必要）
    protected $SessionDestination = 'File';

    // 自動読み込みを行うミドルウェア（すべてのルーティングにおいて実行されるミドルウェア。上から順番にロードされます。）
    protected $AutoLoadedMiddleware = [];

    // セーフモード起動時に有効化されるミドルウェア（本設定に影響を与えずミドルウェアの切り分けが可能）
    protected $SafemodeEnableMiddleware = [];

    // 自動読み込みされたミドルウェアの実行を拒絶可能にするか（trueの場合はコントローラーやルーティングで「disabled_middleware()」メソッドが使用可能）
    protected $AllowLocalDisableMiddleware = true;

    // 指定ルーティングが存在しなかった場合の挙動（デフォルトは404を吐き出す。指定のルーティングに転送することも可能。）
    protected $NotFoundBehavior = '404Error';

    // ルーティングが存在しなかった場合に転送する際のルーティング（ルーティング設定に則り記述）
    protected $NotFoundJumpToRouting = '/';

    // 最大試行回数（もし転送先のルーティングが存在しなかった場合に何回指定するか）
    protected $MaximumTrial = 3;

    // 最終着地点（万が一転送先のルーティングが存在しなかった場合の挙動。デフォルトは404エラー）
    protected $Finaly = '404Error';

    // ルーティングファイルの場所（ricoコマンドの存在するディレクトリをルートとしたパス）
    protected $router_file = '/Configure/router.php';

    // CSRFトークンを格納しているフォームの名前
    protected $CSRFFormName = 'csrf_token';

    // Holyテンプレートエンジンの出力時にhtml特殊文字をエスケープせずに出力するか
    protected $allowUnescapedView = false;
    
    // セキュアアップロードモード（ファイルのバイナリと拡張子を検証して指定されたジャンルのファイルのみを受け付ける）
    protected $allowSecureUpload = true;

    // 許可するファイルタイプ
    protected $acceptedFileType = [
        'music',
        'video',
        'text',
        'executable'
    ];

    // テンプレートエンジンのクラス
    protected $TemplateEngine = Fratello\Holy\Wing::class;

    // テンプレートのディレクトリ名
    protected $TemplateDir = '/Web/App/Template';

    // データベースの設定
    protected $DataBase = [
        'db' => 'mysql',
        'host' => 'localhost',
        'port' => '3306',
        'User' => 'root',
        'password' => ''
    ];

    // ミドルウェアエイリアスの登録（連想配列のキーを使用してミドルウェアのコールができるようにする）
    protected $middleware = [
        'maintenance' => Fratello\Henrietta\Middleware\Maintenance::class
    ];

    // ricoコマンドに自作処理を登録
    protected $rico_registration = [];

    // クッキーへのセッションIDの保存名
    protected $SessionClientSavedName = 'FRATELLO_SESSION';
    
    // サーバー側のセッション情報の保存名
    protected $SessionServerSavedName = 'FRATELLO_SESSION_{{SESSION_ID}}';

    // 最適化オプション（rico optimize:start実行時の処理。処理をより高速にするためのオプションを記述）
    protected $OptimizeOptions = [
        'CachedPreparedTemplate',
        'HTMLCommentRemove',
        'UseStaticCacheAlways',
        'TemplateAccessionElimination',
        'UnUsedHoly'
    ];

    // ブートオプション（アプリケーションの起動時にどのような設定で起動するか（最小構成やミドルウェアを一切使わない等））
    protected $BootOption = [
        'MinimumConfiguration',
        'UnUsedTemplateEngine',
        'UnUsedMiddleware',
        'UnUsedHoly',
        'UseSampleStaticRequestDatas'
    ];
}