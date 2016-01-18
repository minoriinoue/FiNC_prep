def count_overlap_number(array)
	result_hash = {}
	array.sort!

	# Initialize the previous value with number
	# smaller than the first value by 1.
	prev_value = array[0] - 1
	
	same_number_sequence = false
	same_number = 0
	same_number_counter = 1

	array.each do |next_value|
		if prev_value == next_value
			# Overlap found
			same_number_sequence = true
			same_number = next_value
			same_number_counter += 1
		elsif same_number_sequence
			# The same number sequence ended. Thus add the same number
			# to the result array.
			result_hash.store(same_number, same_number_counter)
			# Reset the parameters
			same_number_sequence = false
			same_number_counter = 1
		end
		prev_value = next_value
	end
	
	return result_hash
end

array = [1, 1, 1, 2, 2, 3]
puts "{1 => 3, 2 => 2} = " + count_overlap_number(array).to_s

array = [1, 2, 2, 1, 1, 3]
puts "{1 => 3, 2 => 2} = " + count_overlap_number(array).to_s

array = [1, 2, 3]
puts "{} = " + count_overlap_number(array).to_s
