<?php $view->extend('JobPortalFrontBundle::layout.html.php') ?>
<?php $view['slots']->set('title', 'Dasti | Profil utilisateur') ?>
<?php $view['slots']->start('body') ?>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.8/angular.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular-sanitize.min.js"></script>
<div class="container-fluid main_body_bg" ng-app="examApp" ng-controller="examController">
    <div class="container">

        <div class="col-lg-12 col-sm-12 exam_wrap">
            <div class="col-lg-1 col-sm-1">
                <div class="exam">
                    <div class="timing_bg">
                        <div style="width:18px; border-radius:10px; height:{{height}}px; background:#006633;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-sm-10">
                <?php //print_r($questions); die; ?>
                <h2>Developpeur Web</h2>
                <form action = "<?php echo $view['router']->generate('test_score') ?>" method = "post">
                    <div class="exam" >
                        <div class="question" ng-bind-html="page_question">

                        </div>
                        <div class="division"></div>
                        <div class="clearfix"></div>

                        <div class="ans_wrap">
                            <ul ng-repeat="answer in answers">
                                <li><a href="javascript:void(0);"  ng-click="answerOption(answer.id, answer.question_id);" >{{answer.answer}}</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ans_wrap">
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="btn_next_wrap">
                            <input type="button" id = "form_next" class="btn_next" ng-click="nextQuestion();" value={{submitbuttonvalue}} />
                            <!-- <input type="submit" id = "form_submit" style ="display: none;" ng-click="nextQuestion();"  class="btn_next" value="Submit" /> -->
                        </div>

                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
            <div class="col-lg-1 col-sm-1">
                <div class="points">
                    <div class="score_bg">

                        <div style="width:20px; border-radius:10px; height:{{question_height}}px; position: absolute; z-index: 99;  background: #ccc; "></div>
                        <div style="width:20px; border-radius:10px; height:520px; background:#007ab0; "></div>




                    </div>
                    <div class="score_point_wrap">
                        <div class="score_point" style="height:25px; padding-top:20px;">150</div>
                        <div class="score_point" style="height:150px; padding-top:145px;">75</div>
                        <div class="score_point" style="height:260px; padding-top:180px;">50</div>
                        <div class="score_point" style="height:105px; padding-top:60px;">25</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <p class="score_point" style="margin:5px 0px 0px;">{{totalquestion}} of 5</p>
                </div>
            </div>
            <div class="clearfix"></div>


        </div>
        <div class="clearfix"></div>
    </div>
</div>
<script type="text/javascript">
    var app = angular.module('examApp', ['ngSanitize']);
    app.controller('examController', function ($scope, $http, $interval) {
        $scope.total_question = 5;
        $scope.questions = <?php echo $questions; ?>;
        var firstQuestion = $scope.questions.pop();
        $scope.totalquestion = 1;
        $scope.page_question = firstQuestion.question;
        $scope.answers = firstQuestion.answer;
        $scope.submitbuttonvalue = "Metter en pause a la prochaine question";
        // $interval(fn, delay, [count], [invokeApply], [Pass]);
        $scope.height = 540;
        $scope.question_height = 520;
        $scope.leftstatusbar = $interval(function () {
            $scope.height = $scope.height - 1.2
        }, 1000, 2700);

        $scope.array_questions_answer = [];
        $scope.answerOption = function (answer, question) {
            $scope.score_array = {question: question, answer: answer};
        }


        $scope.nextQuestion = function () {
            if ($scope.totalquestion >= $scope.total_question) {
                if (!angular.isUndefined($scope.score_array) && $scope.score_array != "") {
                    $scope.array_questions_answer.push($scope.score_array);
                    $scope.score_array = "";
                }
                var given_question_answer = $scope.array_questions_answer;
                $.ajax({
                    type: "POST",
                    url: "/web/app_dev.php/testScore",
                    data: {given_question_answer},
                    success: function (response) {
                        alert(response);
                    }
                });
            }
            else {

                var serialQuestion = $scope.questions.pop();
                $scope.question = serialQuestion.question;
                $scope.page_question = $scope.question;
                $scope.answers = serialQuestion.answer;
                /* Push only the checked number */
                if (!angular.isUndefined($scope.score_array) && $scope.score_array != "") {
                    $scope.array_questions_answer.push($scope.score_array);
                    $scope.score_array = "";
                }
                if ($scope.totalquestion == ($scope.total_question - 1 ) ) {
                    $scope.submitbuttonvalue = "Submit";
                }
                $scope.totalquestion++;
                $scope.question_height -= 104;
            }
        };

    });



</script>


<?php $view['slots']->stop('body') ?>