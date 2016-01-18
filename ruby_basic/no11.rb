def below_15(array)
	sum = 0
	array.each do |number|
		sum += number
		if sum > 15
			break
		end
	end
	return sum
end
