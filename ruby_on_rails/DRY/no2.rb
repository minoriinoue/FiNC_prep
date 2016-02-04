class BookController < ApplicationController

  def find_book
    @book = Book.find(params[:id])
  end
  
  def index
    @books = Book.all
  end

  def show
    @book
  end

  def new
    @book = Book.new
  end

  def create
    book = Book.new(params[:book].permit(:title, :author))
    book.save
    redirect_to root_path
  end

  def edit
    @book
  end

  def update
    @book.update(params[:book].permit(:title, :author))
    redirect_to root_path
  end

  def destroy
    @book.destroy
    redirect_to root_path
  end

  private 
  before_action :find_book, only: [:show, :edit, :update, :destroy]
end
