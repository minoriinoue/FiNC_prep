Rails.application.routes.draw do
  namespace :admit do
    resources :companies do
      collection do
        post 'create'
      end

      member do
        collection do
          get 'new'
        end
        
        put 'edit'
        delete 'destroy'

      end
    end
  end
end
