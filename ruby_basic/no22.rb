# This function returns the numbers which appear more than once
# in the argument array.
#
# 1. First sort the array in the ascending order.
# 2. Keep checking the next number until the next number is the
#    same as the previous number. (This means a sequence of the
#    same number started.)
# 3. To avoid adding the number to the result array multiple
#    times, keep checking the next number until the next number
#    is different from the previous number.
# 4. Add the previous number to the result array and repeat the
#    same process from 2. until reaches to the end of the array.
def return_overlap(array)
	result_array = []
	sorted_array = array.sort

	# Initialize the previous value with the number
	# smaller than the first value in the array by 1.
	prev_value = sorted_array[0] - 1
	
	same_number_sequence = false

	sorted_array.each do |next_value|
		if prev_value == next_value
			# Overlap found
			same_number_sequence = true
		elsif same_number_sequence
			# The same number sequence ended. Thus add the same number
			# to the result array.
			result_array << prev_value
			same_number_sequence = false
		end
		prev_value = next_value
	end
	
	result_array
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
