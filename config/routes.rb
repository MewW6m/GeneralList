Rails.application.routes.draw do
  devise_for :users
  get 'sample' => 'welcome#index'


  # blockの最後に以下を追加
  get '*not_found' => 'application#routing_error'
  post '*not_found' => 'application#routing_error'

  #devise_for :users
  #devise_for :users, :controllers => {
  #  sessions: 'users/sessions'
  #}

  #devise_scope :user do
  #  root "users/sessions#new"
  #end

  # Define your application routes per the DSL in https://guides.rubyonrails.org/routing.html

  # Defines the root path route ("/")
  # root "articles#index"
end
