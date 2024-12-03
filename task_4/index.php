<?php

$text = <<<TXT
<p class="big">
	Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>.
</p>
<p class="float">
	<img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image">
	<span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span>
</p>
<p>
	<i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i>
</p>
TXT;


function truncateHtmlByWords ($dom, $wordCount){
    $xpath = new DOMXPath($dom);
    $paragraphs = $xpath->query('//p');
    $totalWords = 0;
    foreach ($paragraphs as $paragraph) {
        $text = $paragraph->textContent;
        $text = preg_replace('/\s+/', ' ', $text); // очистка от лишних пробелов
        $text = trim($text);
        $words = explode(' ', $text); // разделение на слова
        $numWords = count($words);

        if ($totalWords + $numWords > $wordCount) {
            $wordsToTruncate = $wordCount - $totalWords;
            if ($wordsToTruncate > 0) { // если есть слова которые нужно обрезать, обрезаем
                $truncatedWords = array_slice($words, 0, $wordsToTruncate);
                $truncatedText = implode(' ', $truncatedWords) . '...';
                $paragraph->nodeValue = $truncatedText; // меняем значение узла на обрезанный текст
            } else { // если нет слов которые нужно обрезать
                $paragraph->parentNode->removeChild($paragraph); // удаляем лишний абзац
            }
            //Удаляем все последующие абзацы
            $nextParagraph = $paragraph->nextSibling;
            while ($nextParagraph !== null) {
                $nextParagraph->parentNode->removeChild($nextParagraph);
                $nextParagraph = $paragraph->nextSibling; // обновляем после удаления
            }
            break; // выходим из цикла, так как задача выполнена
        } else {
            $totalWords += $numWords;
        }
    }

    return $dom;
}


$doc = new DOMDocument;
$BOM = "\xEF\xBB\xBF";
$doc->loadHTML($BOM . $text);

print_r(truncateHtmlByWords($doc,29)->saveHTML());




