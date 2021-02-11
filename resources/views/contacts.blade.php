@extends('layouts.app')
@section('content')
    <div class="container col-md-6">
        <div class="card">
            <div class="card-header bg-dark text-light lead">
                Contatos
            </div>
            <div class="card-body">
                <div class="container ml-4">
                    <div class="row">
                        <div class="col-sm mr-auto">
                            <a href="">
                                <p class="lead"><i class="fab fa-linkedin mr-2"></i>LinkedIn</p>
                            </a>
                        </div>
                        <div class="col-sm mr-auto">
                            <a href="">
                                <p class="lead"><i class="fab fa-github mr-2"></i>Github</p>
                            </a>
                        </div>
                        <div class="col-sm ml-auto">
                            <a href=""  data-toggle="modal" data-target="#exampleModal">
                                <p class="lead"><i class="fas fa-envelope-open-text mr-2"></i>Email</p>
                            </a>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Email</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center">
                                      <p class="lead"><i class="fas fa-envelope-open-text mr-3"></i>jackson.s.aguiar@gmail.com</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
