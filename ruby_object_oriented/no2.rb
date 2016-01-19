class Book
  attr_accessor: :title

  def intialize(title)
    @title = title
  end

  def rename_title(title)
    @title = title
  end

  def price_increase
    @price *= 2
  end
end

class Comic < Book
  def price_increase
    @price *= 1.5
  end
end

class Magazine < Book
  def price_increase
    @price *= 3
  end
end
