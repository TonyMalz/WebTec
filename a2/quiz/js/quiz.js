var Quiz = {

	currentRound : 0,
	maxRounds : 10,

	selectedAnswer : null,
	correctAnswer : null,

	currentQuestion : null,

	questionsAsked : [],
	correctAnswersGiven : 0,

	confirmLayer : null,
	confirmBtn: null,
	nextQuestionBtn : null,
	questionDisplay: null,
	progressBar : null,
	pointsDisplay : null,
	maxRoundsDisplay : null,
	currentRoundDisplay : null,
	possibleAnswers : [],

	run : function(rounds){
		this.init(rounds);
		this.nextRound();
	},

	init : function(rounds){
		this.maxRounds = ~~rounds || this.maxRounds;
		
		this.confirmBtn = $('#confirm');
		this.confirmLayer = $('<li></li>').addClass('confirm').append(this.confirmBtn);
		this.confirmLayer.on('click',this.checkAnswer);

		this.nextQuestionBtn = $('#next');
		this.nextQuestionBtn.on('click',this.nextRound);

		this.progressBar = $('#progress');
		this.progressBar.attr('max', this.maxRounds);

		this.pointsDisplay = $('#points');
		this.pointsDisplay.text(0);

		this.maxRoundsDisplay = $('#maxRounds');
		this.maxRoundsDisplay.text(this.maxRounds);

		this.currentRoundDisplay = $('#currentRound');
		this.questionDisplay = $('#question');

		$('.possibleAnswers li').each(function(argument) {
			Quiz.possibleAnswers.push($(this));
		});
	},

	nextRound : function(){
		Quiz.clearBoard();

		Quiz.currentRoundDisplay.text(Quiz.currentRound);
		Quiz.progressBar.attr('value', Quiz.currentRound++);
		
		if (Quiz.currentRound <= Quiz.maxRounds) {
			Quiz.getNextQuestion();
		} else {
			Quiz.showResults();
		}
	},

	showResults : function(){
		console.log('done!');
	},

	removeClickEvents : function(){
		$.each(this.possibleAnswers,function () {
			this.off('click');
		});
	},

	removeAnswerHiglights : function(){
		$.each(this.possibleAnswers,function () {
			this.removeClass('selectedAnswer');
		});
	},

	clearBoard : function () {
		Quiz.nextQuestionBtn.fadeOut();
		$.each(this.possibleAnswers,function () {
			this.removeClass('wrongAnswer correctAnswer');
		});
		this.confirmBtn.text('Sicher?').removeClass('wrongAnswer correctAnswer');
		this.confirmLayer.hide();
	},

	getNextQuestion : function(){
		$.ajax({
			url : 'php/questions.php',
			data: {'questions_asked': JSON.stringify(this.questionsAsked) },
			dataType: 'json'
		}).then(function(data){
			if (data.status === "okay") {
				Quiz.currentQuestion = data.question;
				Quiz.showQuestion();
			} else {
				var msg = data.msg ? data.msg : "Entschuldigung, es konnte leider keine neue Frage geladen werden.";
				Quiz.showError(msg);
			}
			
		}).fail(function(){
			Quiz.currentQuestion = null;
			Quiz.showError("Entschuldigung, es konnte leider keine neue Frage geladen werden.");
		});
	},

	showQuestion : function(){
		if (!this.currentQuestion) {
			this.showError();
		}
		
		//console.log(this.currentQuestion)
		this.questionDisplay.text(this.currentQuestion.text);
	    
	    $.each(this.currentQuestion.possibleAnswers,function (index,answer) {
	    	console.log(answer);
	    	if (answer.is_correct){
    			Quiz.correctAnswer = index;
    		}
	    	// set answer text and add click events
	    	Quiz.possibleAnswers[index].text(answer.answer).on('click', function (e) {
	    		Quiz.selectedAnswer = index;
	    		//remove higlight on previously selected answer
	    		Quiz.removeAnswerHiglights();
	    		Quiz.confirmBtn.show();	    		
	    		$(this).addClass('selectedAnswer').after(Quiz.confirmLayer.fadeIn(300));
	    		console.log('clicky on '+ index + " " + answer.is_correct );
	    	});
	    });
	    
	},

	checkAnswer : function(){
		Quiz.removeAnswerHiglights();
		var questionWasAlreadyAsked = Quiz.questionsAsked.indexOf(Quiz.currentQuestion.id) >= 0;
		
		if (questionWasAlreadyAsked) {
			console.log("answer to this question was already given!");
			return;
		}

		if (Quiz.selectedAnswer === Quiz.correctAnswer){
			Quiz.confirmBtn.text('Richtig!').addClass('correctAnswer');
			Quiz.correctAnswersGiven++;
		} else {
			Quiz.confirmBtn.text('Leider falsch').addClass('wrongAnswer');
			Quiz.possibleAnswers[Quiz.selectedAnswer].addClass('wrongAnswer');
		}

		//reveal correct answer
		Quiz.possibleAnswers[Quiz.correctAnswer].addClass('correctAnswer');

		Quiz.pointsDisplay.text(Quiz.correctAnswersGiven);
		Quiz.questionsAsked.push(Quiz.currentQuestion.id);
		
		Quiz.removeClickEvents();
		Quiz.confirmLayer.append(Quiz.nextQuestionBtn.fadeIn());
	},

	showError : function(msg){
		console.log(msg);
	}

};