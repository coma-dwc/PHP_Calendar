<?php
// class Person{

//   public static function greeting(){
//     echo "こんにちは！";
//   }

//   public function some_other_function(){
//     //クラス内からstatic関数を呼び出す際は「self::」という形で記述
//     self::greeting();
//   }
// }


// //クラス外からstatic関数を呼び出す際は「クラス名::」という形で記述
// //ただし、クラス外からstatic関数を呼び出せるのは該当するstatic関数が「public」の場合のみ
// Person::greeting();


//■コンストラクタ

// class Person {

//   public function __construct() {
//     echo "コンストラクタの処理が実行されました！";
//   }

// }

// //以下の処理でインスタンスを生成
// $test = new Person();


//■Calendarクラスの定義

class Calendar {
  //変数の定義
  private $year;
  private $month;

  //コンストラクタの作成・引数の設定
  public function __construct($y, $m) {
    //変数の設定
    $this->year = $y;
    $this->month = $m;
  }

  //get_info関数の作成
  public function get_info() {
    //get_info関数の返り値指定
    return $this->year ."-" .$this->month;
  }


}

//テスト表示用
$test = new Calendar(2000,1);
echo "↓「2000年1月」が指定されたCalendarインスタンスのget_info関数実行結果<br>";
echo $test->get_info();