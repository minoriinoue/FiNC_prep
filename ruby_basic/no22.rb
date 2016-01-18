def return_overlap(array)
	result_array = []
	array.sort!

	# Initialize the previous value with number
	# smaller than the first value by 1.
	prev_value = array[0] - 1
	
	same_number_sequence = false
	same_number = 0

	array.each do |next_value|
		if prev_value == next_value
			# Overlap found
			same_number_sequence = true
			same_number = next_value
		elsif same_number_sequence
			# The same number sequence ended. Thus add the same number
			# to the result array.
			result_array.push(same_number)
			same_number_sequence = false
		end
		prev_value = next_value
	end
	
	return result_array
end

# return [1]
array = [1, 1, 3]
puts "[1] = " + return_overlap(array).to_s
# return [1]
array = [1, 1, 1, 2, 3]
puts "[1] = " + return_overlap(array).to_s
# return [1 , 2]
array = [1, 1, 1, 2, 2, 3]
puts "[1 , 2] = " + return_overlap(array).to_s
# return [1]
array = [1, 3, 1]
puts "[1] = " + return_overlap(array).to_s
