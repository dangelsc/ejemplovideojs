var app=angular.module('videoapp',['ui.router']);
app.controller('videocontroller',function($scope,$http,$state){
    function cargar_video(){
        $http.get('/lista').then(function(server){
            
                $scope.listavideo=server.data.lista;
            
        });
    }
    function cargar_comentario(){
        $http.get('/listacc/'+$scope.select.id).then(function(server){
            
                $scope.listaco=server.data.lista;
            
        });
    }
    cargar_video();
    $scope.select={};
    $scope.onclickSelect=function(item){
        $scope.select=item;
        cargar_comentario();
        
        $http.get('/visto/'+item.id).then(function(server){
                $scope.item.visto=server.data.visto;
                cargar_video();
                
        });
    }
     $scope.onclickcomentario=function(){
        //$scope.select=item;
        $http.post('/comentario/'+$scope.select.id,{comentario:$scope.comentario}).then(function(server){
                //$scope.item.visto=server.data.visto;
                $scope.comentario='';
                cargar_comentario();
        });
    }
    
   
});
app.config(function($stateProvider){
    $stateProvider
    .state('/detalle',{
        views:{
            'detallesubasta':{
                templateUrl:'/detalle',
            }
        }
    })
    .state('formulario',{
        views:{
            'form':{
                templateUrl:'/form',
            }
        }
    });
});