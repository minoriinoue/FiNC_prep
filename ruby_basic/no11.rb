def below_15(array)
	result_array = []
	sum = 0
	array.each do |number|
		sum += number
		result_array.push(number)
		if sum > 15
			break
		end
	end
	return result_array
end

array = [9, 4, 5, 2]
puts "[9, 4, 5] = " + below_15(array).to_s
