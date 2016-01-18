def if_overlap(array)
	sorted_array = array.sort

	# Initialize the previous value with number
	# smaller than the first value by 1.
	prev_value = sorted_array[0] - 1

	sorted_array.each do |next_value|
		if prev_value == next_value
			# Overlap found
			return true
		end
		prev_value = next_value
	end
	
	# Falling through the loop means there was no
	# overlap in the array. Thus return false.
	return false
end

# return true
array = [1, 1, 3]
puts if_overlap(array)
# return true
array = [1, 3, 1]
puts if_overlap(array)
# return false
array = [1, 2, 3]
puts if_overlap(array)
