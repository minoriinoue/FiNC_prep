Rails.application.routes.draw do
  namespace :admin do
    resources :companies, only: [:new, :create, :edit, :destroy]
  end
end

# result
# Prefix             Verb   URI Pattern                         Controller#Action
# admin_companies    POST   /admin/companies(.:format)          admin/companies#create
# new_admin_company  GET    /admin/companies/new(.:format)      admin/companies#new
# edit_admin_company GET    /admin/companies/:id/edit(.:format) admin/companies#edit
# admin_company      DELETE /admin/companies/:id(.:format)      admin/companies#destroy
