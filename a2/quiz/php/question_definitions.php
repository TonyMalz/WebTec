<?php

/*
 * Question classes
 */
class Answer {
    public $answer;
    public $is_correct;

    function __construct($answer, $is_correct){
        $this->answer = $answer;
        $this->is_correct = $is_correct;
    }
}

class Question
{
    public $id;
    public $text;
    public $possibleAnswers;

    function __construct($id){
        $this->id = $id;
        $this->possibleAnswers = array();
    }

    function addAnswer($answer) {
        $this->possibleAnswers[] = $answer;
    }
}

/*
 * Question definitions
 */
$all_questions = array();

/*
 * Question 1
 */
$question = new Question(1);
$question->text = "Was ist eine populäre Bezeichnung für eine Regelung zum Schutze des Verbrauchers in Deutschland, die sich auf Mängel in der Montageanleitung bezieht?";
$question->addAnswer(new Answer("Reklamations-Klausel", false));
$question->addAnswer(new Answer("B-Waren-Verordnung", false));
$question->addAnswer(new Answer("IKEA-Klausel", true));
$question->addAnswer(new Answer("Ramsch-Klausel", false));
$all_questions[] = $question;

/*
 * Question 2
 */
$question = new Question(2);
$question->text = "Welcher der genannten Bäume zählt NICHT zu den Nadelbäumen?";
$question->addAnswer(new Answer("Urweltmammutbaum", false));
$question->addAnswer(new Answer("Araukarie", false));
$question->addAnswer(new Answer("Lärche", false));
$question->addAnswer(new Answer("Ilex", true));
$all_questions[] = $question;

/*
 * Question 3
 */
$question = new Question(3);
$question->text = "Was spielt man, wenn man in den USA eine 'Fruit Machine' benutzt?";
$question->addAnswer(new Answer("Poker", false));
$question->addAnswer(new Answer("Einarmiger Bandit", true));
$question->addAnswer(new Answer("Bingo", false));
$question->addAnswer(new Answer("Flipper", false));
$all_questions[] = $question;

/*
 * Question 4
 */
$question = new Question(4);
$question->text = "Wie heißt der Teil in einem Verbrennungsmotor, der am Pleuel anngebracht ist und sich im Zylinder bewegt?";
$question->addAnswer(new Answer("Zylinderkopf", false));
$question->addAnswer(new Answer("Zündkerze", false));
$question->addAnswer(new Answer("Ölfilter", false));
$question->addAnswer(new Answer("Kolben", true));
$all_questions[] = $question;

/*
 * Question 5
 */
$question = new Question(5);
$question->text = "Wie nennt man 1000 Kilobyte auf der Computer-Festplatte?";
$question->addAnswer(new Answer("1 Byte", false));
$question->addAnswer(new Answer("1 Megabyte", true));
$question->addAnswer(new Answer("1 Gigabyte", false));
$question->addAnswer(new Answer("1 Terabyte", false));
$all_questions[] = $question;

/*
 * Question 6
 */
$question = new Question(6);
$question->text = "Unter welchem Vorwurf wurde 1962 gegen den 'Spiegel' ermittelt?";
$question->addAnswer(new Answer("Beamtenbeleidigung", false));
$question->addAnswer(new Answer("Steuerhinterziehung", false));
$question->addAnswer(new Answer("Korruption", false));
$question->addAnswer(new Answer("Landesverrat", true));
$all_questions[] = $question;

/*
 *	Add additional questions here, pay attention to the assignment of unused IDs!
 */
$question = new Question(7);
$question->text = "Was ist das Ergebnis der Summe aller Natürlichen Zahlen (1+2+3+4...)?";
$question->addAnswer(new Answer("unendlich", false));
$question->addAnswer(new Answer("42", false));
$question->addAnswer(new Answer("-1/12", true));
$question->addAnswer(new Answer("0", false));
$all_questions[] = $question;

$question = new Question(8);
$question->text = "In welcher deutschen Stadt wurde die erste Toilette in Europa eingeführt?";
$question->addAnswer(new Answer("Coburg", true));
$question->addAnswer(new Answer("Darmstadt", false));
$question->addAnswer(new Answer("Essen", false));
$question->addAnswer(new Answer("Bonn", false));
$all_questions[] = $question;

$question = new Question(9);
$question->text = "Was ist Ailurophilie?";
$question->addAnswer(new Answer("Eine Geschlechtskrankheit", false));
$question->addAnswer(new Answer("Die Angst vor Fischen", false));
$question->addAnswer(new Answer("Eine griechische Heldensaga", false));
$question->addAnswer(new Answer("Die Liebe zu Katzen", true));
$all_questions[] = $question;

$question = new Question(10);
$question->text = "Der häufigste Name in deutschen Chefetagen ist?";
$question->addAnswer(new Answer("Chantalle", false));
$question->addAnswer(new Answer("Adolf", false));
$question->addAnswer(new Answer("Peter", false));
$question->addAnswer(new Answer("Wolfgang", true));
$all_questions[] = $question;

$question = new Question(11);
$question->text = "Welche der folgenden Worte erfand Martin Luther NICHT?";
$question->addAnswer(new Answer("Schandfleck", false));
$question->addAnswer(new Answer("Machtwort", false));
$question->addAnswer(new Answer("Lückenbüßer", false));
$question->addAnswer(new Answer("Lügenpresse", true));
$all_questions[] = $question;

$question = new Question(12);
$question->text = "Was ist ein Ritzenfüller?";
$question->addAnswer(new Answer("Ein Durchfallmittel", false));
$question->addAnswer(new Answer("Eine Bausubstanz", false));
$question->addAnswer(new Answer("Ein Parasit", false));
$question->addAnswer(new Answer("Das Schmaumstoffstück zw. Doppelmatratzen", true));
$all_questions[] = $question;

$question = new Question(13);
$question->text = "Der Erdkern besteht neben Eisen hauptsächlich aus?";
$question->addAnswer(new Answer("Nickel", true));
$question->addAnswer(new Answer("Blei", false));
$question->addAnswer(new Answer("Silber", false));
$question->addAnswer(new Answer("Zinn", false));
$all_questions[] = $question;

$question = new Question(14);
$question->text = "Stiefmutter heißt auf Schwedisch?";
$question->addAnswer(new Answer("Else", false));
$question->addAnswer(new Answer("Deivatta", false));
$question->addAnswer(new Answer("Göre", false));
$question->addAnswer(new Answer("Bonusmamma", true));
$all_questions[] = $question;

$question = new Question(15);
$question->text = "Jack Sparrow (in Fluch der Karibik) sollte ursprünglich von welchem Schauspieler gespielt werden?";
$question->addAnswer(new Answer("Chuck Norris", false));
$question->addAnswer(new Answer("Vin Diesel", false));
$question->addAnswer(new Answer("Jack Black", false));
$question->addAnswer(new Answer("Jim Carrey", true));
$all_questions[] = $question;
