<?php

use Chrisbjr\ApiGuard\ApiGuardController;

class ApiBaseController extends ApiGuardController {
    private $limits = [
        'key' => [
            'increment' => '1 hour',
            'limit' => 100
        ],
        'method' => [
            'increment' => '1 day',
            'limit' => 1000
        ]];

    protected $apiMethods = [
        'index'    => [ 'level' => 1 ],
        'store'    => [ 'level' => 5 ],
        'show'     => [ 'level' => 1 ],
        'update'   => [ 'level' => 5 ],
        'destroy'  => [ 'level' => 8 ]
    ];


    public function __construct($model, $transformer, array $customApiMethods = array()) {
        foreach( $this->apiMethods as $endpoint => &$options ) {
            $options['limits'] = $this->limits;
            $options['keyAuthentication'] = true;
        }

        foreach ( $customApiMethods as $endpoint => $options )
            foreach( $options as $key => $value )
                $this->apiMethods[ $endpoint ][ $key ] = $value;

        $this->model = $model;
        $this->transformer = $transformer;
        parent::__construct();
    }


    public function index() {
        $per_page = Input::get('per_page', 10);
        $paginator = $this->model->paginate($per_page);

        return $this->response->withPaginator($paginator, $this->transformer);
    }


    public function store() {
        if($this->model->save())
            return $this->response->withItem($this->model, $this->transformer);

        return $this->response->errorWrongArgs($this->model->errors()->all()[0]);
    }


    public function show($id) {
        $found = $this->model->find($id);
        if ( $found )
            return $this->response->withItem($found, $this->transformer);

        return $this->response->errorNotFound();
    }


    public function update($id) {
        $found = $this->model->find($id);
        if ( !$found )
            return $this->response->errorNotFound();


        if($found->save())
            return $this->response->withItem($found, $this->transformer);

        return $this->response->errorWrongArgs($found->errors()->all()[0]);
    }

    public function destroy($id) {
        $found = $this->model->find($id);
        if ( !$found )
            return $this->response->errorNotFound();

        $found->delete();
        return Response::json('', 204);
    }


}