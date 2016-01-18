# Find the minimum number in an array with linear search
def find_min(array)
	min = array[0]
	array.each do |value|
		if value < min
			min = value
		end
	end
	return min
end

array = [1,2,3]
puts find_min(array)
