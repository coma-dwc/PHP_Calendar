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
//<php
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

  //関数の宣言
  public function create_rows() {
    //最終日を求める
    $last_day = date("j", mktime(0,0,0,$this->month + 1, 0, $this->year));
    //テスト表示用
    //echo $this->year ."年" .$this->month ."月の最終日は" .$last_day ."日です";

    //配列を作成する
    $rows = array();
    //カレンダーの「一行」となる配列を作る
    $row = self::init_row();

    //繰り返し処理を実装する
    for( $i = 1; $i <= $last_day; $i++ ) {
      //配列番号に対応する曜日を取得する
      $date = Date("w", mktime(0,0,0,$this->month,$i,$this->year));
      //対応する配列番号に日付を入れる
      $row[$date] = $i;

      //配列$rowsに一行を加える
      if($date == 6 || $i == $last_day ) {
        $rows []= $row;
        //配列$rowの初期化
        $row = self::init_row();
      }
    }
    //返り値の指定
    return $rows;
  }

  //get_info関数の作成
  public function get_info() {
    //get_info関数の返り値指定
    return $this->year ."-" .$this->month;
  }

  //init_row関数の宣言
  private static function init_row() {
    //配列を作成する
    $ary = array();
    //繰り返し構文を書く
    for( $i = 0; $i <= 6; $i++ ) {
      //配列への要素の追加
      $ary[] = ".";
    }
    //値を返す
    return $ary;
  }


}

//■HTMLと連携する
$year = Date("Y"); //今年
$month = Date("n"); //今月
$cal = new Calendar($year, $month);


echo <<< EOL

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>PHP Calendar</title>
    <style>
    h1 {
      font-size: 18px;
      margin: 0;
    }

    th {
      background-color: #cc6;
      font-size: 13px;
      text-align: center;
    }

    td {
      background-color: #EEE;
      font-size: 13px;
      text-align: center;
    }

    input[type="text"] {
      width: 35px;
    }
    </style>
</head>
<body>

<h1>
EOL;

echo $cal->get_info();

echo <<< EOL
</h1>
<table>
  <tr>
    <th>日</th>
    <th>月</th>
    <th>火</th>
    <th>水</th>
    <th>木</th>
    <th>金</th>
    <th>土</th>
  </tr>
EOL;
//foreach文の記述
foreach( $cal->create_rows() as $row ) {
  echo "<tr>";

  //さらに配列をループさせる
  for( $i = 0; $i <= 6; $i++ ) {
    //日付を表示する
    echo "<td>" . $row[$i]."</td>";
  }

  echo"</tr>";
}

echo <<< EOL
</table>

</body>
</html>
EOL;













//テスト表示用
// $test = new Calendar(2000,1);
// $rows = $test->create_rows();
// echo "2000年1月の場合、rowsの中身は以下のようになる。<br><br>";
// print_r($rows);
// echo "↓「2000年1月」が指定されたCalendarインスタンスのget_info関数実行結果<br>";
// echo $test->get_info();



//■date関数の概要
//<php
/*
$month = date("n"); //今月
$year = date("Y"); //今年

$last_day = date("j", mktime(0,0,0, $month + 1, 0, $year));

echo $year ."年" .$month .  "月の最終日は" .$last_day ."日です。";

*/