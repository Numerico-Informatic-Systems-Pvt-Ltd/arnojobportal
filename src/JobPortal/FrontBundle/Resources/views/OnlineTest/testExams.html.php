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
                        <div style="width:18px; border-radius:10px; height:450px; background:#006633;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-sm-10">
                <?php //print_r($questions); die; ?>
                <h2>Developpeur Web</h2>
                <div class="exam" >
                    <div class="question" ng-bind-html="page_question">
                       
                    </div>
                    <div class="division"></div>
                    <div class="clearfix"></div>

                    <div class="ans_wrap">
                        <ul ng-repeat="answer in answers">
                            <li><a href="#" >{{answer.answer}}</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <div class="btn_next_wrap">
                        <input type="button" class="btn_next" ng-click="nextQuestion();" value="Metter en pause a la prochaine question" />
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-lg-1 col-sm-1">
                <div class="points">
                    <div class="score_bg">
                        <div style="width:20px; border-radius:10px; height:200px;"></div>
                        <div style="width:20px; border-radius:10px; height:320px; background:#007ab0;"></div>
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
    app.controller('examController', function ($scope, $http) {
        $scope.questions = <?php echo $questions; ?>;
        var firstQuestion = $scope.questions.pop();
        $scope.totalquestion = 1;
        $http.get("<?php echo $view['router']->generate('answer_of_question') ?>?question_id=" + firstQuestion.id)
                .success(function (response){
                    $scope.answers = response.data;
                });
        $scope.page_question = firstQuestion.question;
        $scope.nextQuestion = function () {
            var serialQuestion = $scope.questions.pop();
            $scope.question = serialQuestion.question;
            //alert($scope.question);
            $scope.page_question = $scope.question;
           //$scope.page_question = $sce.trustAsHtml($scope.question);
            //alert(serialQuestion.id);
            $http.get("<?php echo $view['router']->generate('answer_of_question') ?>?question_id=" + serialQuestion.id)
            .success(function (response){
                $scope.answers = response.data;
                $scope.totalquestion++;
            });

        };
    });
</script>
<?php $view['slots']->stop('body') ?>