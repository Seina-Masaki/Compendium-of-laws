<!DOCTYPE html>
<html lang="ja">
<head>

</head>
<body>

<?php
require_once('config.php');

try{
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  echo "接続おけ  <br>";
} catch(PDOException $e) {
  echo '接続エラー'.$e->getMessage();
}

$xml = simplexml_load_file("https://elaws.e-gov.go.jp/api/1/lawdata/明治二十九年法律第八十九号");


// $i = "1";
// foreach($xml->ApplData->LawFullText->Law->LawBody->MainProvision->Part as $Part) {
//   foreach($Part->Chapter as $Chapter) {
//     foreach($Chapter->Article as $Article) {
//       // 条数
//       $filename = "roppou$i.txt";
//       $fp = fopen($filename, "a+");
//       $ArticleTitle = $Article->ArticleTitle . PHP_EOL;
//       fwrite($fp, $ArticleTitle);
//       // echo $Article->ArticleTitle."<br>";
//       foreach($Article->Paragraph as $Paragraph) {
//         // 項数
//         if($Paragraph->ParagraphNum >= "2") {
//           $ParagraphNum = $Paragraph->ParagraphNum . "項 ";
//           // echo $ParagraphNum;
//         } else {
//           $ParagraphNum = $Paragraph->ParagraphNum;
//           // echo $Paragraph->ParagraphNum." ";
//         }
//         fwrite($fp, $ParagraphNum);
//         foreach($Paragraph->ParagraphSentence as $ParagraphSentence) {
//           // 項文または条文
//           $Sentence = $ParagraphSentence->Sentence . PHP_EOL;
//           fwrite($fp, $Sentence);
//           // echo $ParagraphSentence->Sentence."<br>";
//           foreach($Paragraph->Item as $Item) {
//             // 号数
//             $ItemTitle = $Item->ItemTitle . "号 ";
//             fwrite($fp, $ItemTitle);
//             // echo $Item->ItemTitle."号 ";
//             foreach($Item->ItemSentence as $ItemSentence) {
//               // 号文
//               $Sentence = $ItemSentence->Sentence . PHP_EOL;
//               fwrite($fp, $Sentence);
//               // echo $ItemSentence->Sentence."<br>";
//             }
//           }
//         }
//       }
//       $i += "1";
//     }
//   }
// }
// fclose($fp);

// // $i = "194";
// foreach($xml->ApplData->LawFullText->Law->LawBody->MainProvision->Part as $Part) {
//   foreach($Part->Chapter as $Chapter) {
//     // 章数
//     // echo $Chapter->ChapterTitle."<br>";
//     foreach($Chapter->Section as $Section) {
//       // 節数
//       // echo $Section->SectionTitle."<br>";
//       foreach($Section->Article as $Article) {
//         // 条数
//         $filename = "roppou$i.txt";
//         $fp = fopen($filename, "a+");
//         $ArticleTitle = $Article->ArticleTitle . PHP_EOL;
//         fwrite($fp, $ArticleTitle);
//         // echo $Article->ArticleTitle."<br>";
//         foreach($Article->Paragraph as $Paragraph) {
//           // 項数
//           if($Paragraph->ParagraphNum >= "2") {
//             $ParagraphNum = $Paragraph->ParagraphNum . "項 ";
//           } else {
//             $ParagraphNum = $Paragraph->ParagraphNum;
//           }
//           fwrite($fp, $ParagraphNum);
//           // echo $Paragraph->ParagraphNum." ";
//           foreach($Paragraph->ParagraphSentence as $ParagraphSentence) {
//             // 項文または条文
//             $Sentence = $ParagraphSentence->Sentence . PHP_EOL;
//             fwrite($fp, $Sentence);
//             // echo $ParagraphSentence->Sentence."<br>";
//             foreach($Paragraph->Item as $Item) {
//               // 号数
//               $ItemTitle = $Item->ItemTitle . "号 ";
//               fwrite($fp, $ItemTitle);
//               // echo $Item->ItemTitle." ";
//               foreach($Item->ItemSentence as $ItemSentence) {
//                 // 号文
//                 $Sentence = $ItemSentence->Sentence . PHP_EOL;
//                 fwrite($fp, $Sentence);
//                 // echo $ItemSentence->Sentence."<br>";
//               }
//             }
//           }
//         }
//         $i += "1";
//       }
//     }
//   }
// }
// fclose($fp);

// foreach($xml->ApplData->LawFullText->Law->LawBody->MainProvision->Part as $Part) {
//   foreach($Part->Chapter as $Chapter) {
//     foreach($Chapter->Section as $Section) {
//       foreach($Section->Subsection as $Subsection) {
//         foreach($Subsection->Article as $Article) {
//           foreach($Article->ArticleTitle as $ArticleTitle) {
//             // 条数
//             $filename = "roppou$i.txt";
//             $fp = fopen($filename, "a+");
//             $ArticleTitle = $Article->ArticleTitle . PHP_EOL;
//             fwrite($fp, $ArticleTitle);
//             // echo $ArticleTitle ."<br>";
//             foreach($Article->Paragraph as $Paragraph) {
//               // 項数
//               if($Paragraph->ParagraphNum >= "2") {
//                 $ParagraphNum = $Paragraph->ParagraphNum . "項 ";
//               } else {
//                 $ParagraphNum = $Paragraph->ParagraphNum;
//               }
//               fwrite($fp, $ParagraphNum);
//               // echo $ParagraphNum;
//               foreach($Paragraph->ParagraphSentence as $ParagraphSentence) {
//                 // 項文または条文
//                 $Sentence = $ParagraphSentence->Sentence . PHP_EOL;
//                 fwrite($fp, $Sentence);
//                 // echo $Sentence . "<br>";
//                 foreach($Paragraph->Item as $Item) {
//                   // 号数
//                   $ItemTitle = $Item->ItemTitle . "号 ";
//                   fwrite($fp, $ItemTitle);
//                   // echo $ItemTitle;
//                   foreach($Item->ItemSentence as $ItemSentence) {
//                     // 号文
//                     $Sentence = $ItemSentence->Sentence . PHP_EOL;
//                     fwrite($fp, $Sentence);
//                     // echo $Sentence . "<br>";
//                   }
//                 }
//               }
//             }
//             $i += "1";
//           }
//         }
//       }
//     }
//   }
// }
// fclose($fp);

// foreach($xml->ApplData->LawFullText->Law->LawBody->MainProvision->Part as $Part) {
//   foreach($Part->Chapter as $Chapter) {
//     foreach($Chapter->Section as $Section) {
//       foreach($Section->Subsection as $Subsection) {
//         foreach($Subsection->Division as $Division) {
//           foreach($Division->Article as $Article) {
//             foreach($Article->ArticleTitle as $ArticleTitle) {
//               // 条数
//               $filename = "roppou$i.txt";
//               $fp = fopen($filename, "a+");
//               $ArticleTitle = $Article->ArticleTitle . PHP_EOL;
//               fwrite($fp, $ArticleTitle);
//               // echo $ArticleTitle . "<br>";
//               foreach($Article->Paragraph as $Paragraph) {
//                 // 項数
//                 if($Paragraph->ParagraphNum >= "2") {
//                   $ParagraphNum = $Paragraph->ParagraphNum . "項 ";
//                 } else {
//                   $ParagraphNum = $Paragraph->ParagraphNum;
//                 }
//                 fwrite($fp, $ParagraphNum);
//                 // echo $ParagraphNum;
//                 foreach($Paragraph->ParagraphSentence as $ParagraphSentence) {
//                   // 項文または条文
//                   $Sentence = $ParagraphSentence->Sentence . PHP_EOL;
//                   fwrite($fp, $Sentence);
//                   // echo $Sentence . "<br>";
//                   foreach($Paragraph->Item as $Item) {
//                     // 号数
//                     $ItemTitle = $Item->ItemTitle . "号 ";
//                     fwrite($fp, $ItemTitle);
//                     // echo $ItemTitle;
//                     foreach($Item->ItemSentence as $ItemSentence) {
//                       // 号文
//                       $Sentence = $ItemSentence->Sentence . PHP_EOL;
//                       fwrite($fp, $Sentence);
//                       // echo $Sentence . "<br>";
//                     }
//                   }
//                 }
//               }
//               $i += "1";
//             }
//           }
//         }
//       }
//     }
//   }
// }
// fclose($fp);





?> 

</body>
</html>