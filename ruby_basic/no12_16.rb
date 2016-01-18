hash = {:key1 => 1, :key2 => 2, :key3 => 3}

# no 13
puts hash[:key2]

hash[:key4] = 4

# no 15
hash.each do |key, value|
	puts "#{key}" + " is " + "#{value.to_s}"
end

# no 16
hash.each do |key, value|
	hash[key] = value * 2
end
puts hash
