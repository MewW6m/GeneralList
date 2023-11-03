Rails.application.routes.draw do
  root to: redirect('users/sign_in')
  devise_for :users, controllers: {
    sessions: 'users/sessions'
  }
  resources :lists, only: [:index, :show]

  get '*not_found' => 'application#routing_error'
  post '*not_found' => 'application#routing_error'

end
