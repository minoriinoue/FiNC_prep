def if_exist(array, number)
	array.each do |value|
		if value == number
			# The number found in array
			return true
		end
	end
	return false
end

array = [1, 2, 3]

# return true
puts if_exist(array, 2)
# return false
puts if_exist(array, 4)
