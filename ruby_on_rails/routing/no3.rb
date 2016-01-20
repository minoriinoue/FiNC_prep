Rails.application.routes.draw do
  resources :rankings
  resources :companies
  resources :articles
  resources :likes
end
