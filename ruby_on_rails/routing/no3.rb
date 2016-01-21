Rails.application.routes.draw do
  resources :companies do
    collection do
      get "ranking"
    end
  end

  resources :projects do
    member do
      put "like"
    end
  end
end

# result
# Prefix            Verb   URI Pattern                   Controller#Action
# ranking_companies GET    /companies/ranking(.:format)  companies#ranking
# companies         GET    /companies(.:format)          companies#index
#                   POST   /companies(.:format)          companies#create
# new_company       GET    /companies/new(.:format)      companies#new
# edit_company      GET    /companies/:id/edit(.:format) companies#edit
# company           GET    /companies/:id(.:format)      companies#show
#                   PATCH  /companies/:id(.:format)      companies#update
#                   PUT    /companies/:id(.:format)      companies#update
#                   DELETE /companies/:id(.:format)      companies#destroy
# like_project      PUT    /projects/:id/like(.:format)  projects#like
# projects          GET    /projects(.:format)           projects#index
#                   POST   /projects(.:format)           projects#create
# new_project       GET    /projects/new(.:format)       projects#new
# edit_project      GET    /projects/:id/edit(.:format)  projects#edit
# project           GET    /projects/:id(.:format)       projects#show
#                   PATCH  /projects/:id(.:format)       projects#update
#                   PUT    /projects/:id(.:format)       projects#update
#                   DELETE /projects/:id(.:format)       projects#destroy
