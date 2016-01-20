Rails.application.routes.draw do
  resources :articles
  resources :users
  resources :projects
  resources :companies
end
